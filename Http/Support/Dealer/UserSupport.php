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

		$data["title"] 		= __("words.users");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["dealer"] 	= $dealer;
		$data["users"]		= $this->getUsersFrom($dealer);

		return $data;
	}

	public function register( $user, $dealer ) {		

		$data["title"] 		= __("words.register");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["dealer"] 	= $dealer;

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
		$data["entity"] 	= $entity;

		return $data;
	}

	public function createFromSendMail( $entity ) {

		$data["title"] 		= __("register.sendmail");
		$data["layout"]		= "layout-md";
		$data["entity"] 	= $entity;

		return $data;
	}

	public function registerFromSendmail( $entity, $request ) {

		Mail::to($request->email)->send( 
			new GetMembershepFromMail($entity) 
		);

		Alert::prefix("system")->success("Solicitud enviada correctamente");
		
		return back();
	}
}

/* End of Controller WarrantySupport.php */