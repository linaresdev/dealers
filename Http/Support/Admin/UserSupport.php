<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Group;
use Delta\Model\UserSession;
use Delta\Alert\Facade\Alert;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use Delta\Http\Email\Admin\RetrievePassword;

class UserSupport {

	protected $user;

	public function __construct( User $user) {
		$this->user = $user;
	}

	public function getUser( $perpage=10 ) {
		$data = $this->user->where("activated", "<", 4);
		$data->orderBY("id", "DESC");

		return $data->paginate($perpage);
	}

	public function setUserConfig( $user, $key, $value ) {

		$user->saveMeta("config", $key, $value);

		return back();
	}

	public function share() {
		return [
			"layout" => "layout-md",
			"hasError" => function($name) {
				if( session()->has("errors") ) {
					$errors = session()->get("errors");

					return $errors->first(
						$name, 
						'<p class="error"> :message </p>'
					);
				}
			}
		];
	}

	public function index() {
		$data["title"] 		= __("words.users");
		$data["optfilters"] = __("filter.user");
		$data["users"]		= $this->getUser();

		return $data;
	}

	public function setUser($user, $state) {
		if( $state != $user->activated ) {
			$user->activated = $state;
			if($user->save()) {
				Alert::prefix("system")->success(
					__("user.st$state.successfull")
				);

				(new UserSession)->news("jobs", [
					"status" 	=> 200,
					"action"	=> __("auth.$state"),
					"subject"	=> __("news.update.user", ["name" => $user->fullname]),
					"registro"	=> $user->id,
				]);
			}
			else {
				Alert::prefix("system")->success(__("user.st$state.error"));
			}
		}
		return back();
	}

	public function register( ) {
		$data["title"] 		= __("user.register");
		return $data;
	}

	public function create($UI, $request ) {

		$this->user->fullname 	= $request->fullname;
		$this->user->user 		= (explode('@', $request->email))[0];
		$this->user->email 		= $request->email;
		$this->user->password 	= $request->pwd;
		#$this->user->activated	= 1;

		if( $this->user->save() ) {

			if( ($org = (new group)->org("profiler")) != null ) {
				$this->user->orgSync($org->id);
			}

			Alert::prefix("system")->success(__("register.successfull"));

			(new UserSession)->news("jobs", [
				"status" 	=> 200,
				"action"	=> __("user.register"),
				"subject"	=> __("news.create.user", ["name" => $this->user->fullname]),
				"registro"	=> $this->user->id,
			]);

			return redirect(__url('__admin/users'));
		}

		Alert::prefix("system")->error(__("register.error"));

		return back()->withInput();

	}

	public function account( $user ) {
		
		$data['title'] 	= __("words.mantenance");
		$data["user"]	= $user;

		return $data;
	}

	public function credentialUpdate($user, $request) {
		
		if( $user->update($request->except("_token")) ) {
			(new UserSession)->news("jobs", [
				"status" 	=> 200,
				"action"	=> __("account.update"),
				"subject"	=> __("news.update.user", ["name" => $user->fullname]),
				"registro"	=> $user->id,
			]);
			return redirect()->to(__url("__admin/users"));
		}

		return back();
	}

	public function passwordUpdate($user, $request) {

		$user->password = $request->pwd;


		if( $user->save() ) {
			return redirect()->to(__url("__admin/users"));
		}

		return back();
	}

	public function passwordExpireCreate( $user, $request ) {

		$mark = now()->createFromFormat(
			'Y-m-d H:i', 
			$request->date.' '.$request->time, 
			config("app.timezone")
		); 

		$validity = new UserSession;
		$validity->timestamps = false;
		$validity->create([
			"type"			=> "password-expire",
			"user_id" 		=> $user->id,
			"created_at" 	=> $mark,
			"updated_at"	=> now()
		]);

		Alert::prefix("system")->success(__("register.successfull"));

		return back();
	}

	public function passwordExpireDelete( $user, $id ) {
		(new UserSession)->find($id)->delete();

		Alert::prefix("system")->success(__("pwd.expired.delete"));

		return back();
	}

	public function sendPasswordReset($user) {

		$token = \Str::random(28);

		if( (new UserSession)->retrievePassword($user, $token) ) {
			
			Mail::to($user)->send( 
				new RetrievePassword( $user, $token ) 
			);	

			Alert::prefix("system")->success(__("send.retrieve"));		
		}

		return back();
	}

	public function deleteForever($user) {

		$ID 		= $user->id;
		$fullname 	= $user->fullname;

		if($user->delete()) {

			Alert::prefix("system")->success(
				__("user.delete.successfull",[":fullname" => $fullname])
			);

			(new UserSession)->news("jobs", [
				"status" 	=> 200,
				"action"	=> __("user.delete.forever"),
				"subject"	=> __("news.delte.user", ["name" => $fullname]),
				"registro"	=> $ID,
			]);

			return redirect(__url("__users"));
		}

		Alert::prefix("system")->error(
			__("user.delete.error", [":fullname" => $fullname])
		);

		return back();
	}
}

/* End of Controller UserSopport.php */