<?php 
namespace Delta\Http\Support\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Alert\Facade\Alert;

use Illuminate\Support\Facades\Mail;
use Delta\Http\Email\Dealer\GetMembershepFromMail;

class UserSupport {

	protected $user;

	public function __construct( User $user ) {
		$this->user = $user;

		app("urls")->addTag("urls", [
			"__smail" => "dealers/__s2"
		]);
	}

	public function getUsersFrom($group) {
		return $group->users()->orderBY('id', 'DESC')->paginate(10);
	}

	public function index( $user, $dealer ) {

		app("urls")->addTag("urls", [
			"__detach" => "dealers/__s2/users/detach"
		]);

		$data["title"] 		= __("words.users");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["ent"] 		= $dealer;
		$data["users"]		= $this->getUsersFrom($dealer);

		return $data;
	}

	public function register( $user, $dealer ) {		

		$data["title"] 		= __("words.register");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["ent"] 		= $dealer;

		return $data;
	}

	public function userCreate( $dealer, $request ) {

		$this->user->fullname 	= $request->firstname.' '.$request->lastname;
		$this->user->publicname = $request->firstname;
		$this->user->user 		= $request->user;
		$this->user->email 		= $request->email;
		$this->user->password 	= $request->password;

		if($this->user->save()) {
			$this->user->orgSync($dealer->id);

			Alert::prefix("system")->success( __("register.successfull") );

			return redirect(__url("dealers/__s2/users"));
		}

		Alert::prefix("system")->success(__("register.successfull"));

		return back();
	}

	public function info( $entity, $user ) {

		$data["title"] 		= __("words.information");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["ent"] 		= $entity;

		return $data;
	}

	public function createFromSendMail( $entity ) {

		$data["title"] 		= __("register.sendmail");
		$data["layout"]		= "layout-md";
		$data["ent"] 		= $entity;

		return $data;
	}

	public function registerFromSendmail( $entity, $request ) {

		Mail::to($request->email)->send( 
			new GetMembershepFromMail($entity) 
		);

		Alert::prefix("system")->success("Solicitud enviada correctamente");
		
		return back();
	}

	public function add( $ent ) {		
		
		$data["title"] 	= __("user.add");
		$data["ent"]	= $ent;
		$data["layout"] = "layout-md";

		return $data;
	}

	public function ajaxUsers( $ent, $src ) {

		app("urls")->addTag("urls", [
			"__sync" => "dealers/__s2/users/sync"
		]);

		$noID = function($ent) {
			$IDS=[];

			foreach( $ent->users as $user) {
				$IDS[] = $user->id;
			}

			return $IDS;
		};

		$data["users"] = (new User)->whereNotIn('id', $noID($ent))->where("fullname", 'LIKE', '%'.$src.'%')->take(10)->get();

		return $data;
	}

	public function syncUser($ent, $ID) {

		$ent->syncUser($ID);

		return redirect(__url("__entity/users"));
	}

	public function detachUser($ent, $ID) {
		$ent->users()->detach($ID);		
		return redirect(__url("__entity/users"));
	}

	public function rol( $ent, $user ) {		
		
		$data["title"] 	= __("user.rol");
		$data["ent"]	= $ent;
		$data["layout"] = "layout-md";
		$data["rol"]	= $user->group($ent->slug)->pivot;

		return $data;
	}



	public function updateRol( $ent, $user, $request ) {

		$data["view"] 	= 0;
		$data["insert"] = 0;
		$data["update"] = 0;
		$data["delete"] = 0;

		foreach($request->all() as $key => $value ) {
			if( array_key_exists($key, $data)) {
				$data[$key] = $value;
			}
		}

		if( ($user->group($ent->slug)->pivot)->update($data)) {
			Alert::prefix("system")->success(__("rol.update.successfull"));
			return back();
		}

		Alert::prefix("system")->error(__("rol.update.error"));
		
		return back();
	}
}

/* End of Controller WarrantySupport.php */