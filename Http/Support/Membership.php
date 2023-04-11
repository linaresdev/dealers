<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\UserReset;
use Delta\Alert\Facade\Alert;
use Illuminate\Support\Facades\Validator;
use Delta\Http\Request\Ruls\MailMembershipRol;

class Membership {

	protected $app;

	public function __construct() {	
	}

	public function successFromToken($dealer, $token) {

		$validator = Validator::make(
			["token" => $token],
			["token" => new MailMembershipRol()]
		);	

		$data["title"] 	= "Membership";
		$data["dealer"] = $dealer;
		$data["guard"]	= $token;
		$data["passes"]	= $validator->passes();
		$data["error"]	= $validator->errors();
		$data["request"] = $this->getRequest($token);
		
		return $data;
	}

	public function getRequest($token) {
		return (new UserReset)->where("type", "request")->where("token", $token)->first();
	}

	public function deleteToken($token) {
		(new UserReset)->where("type", "request")->where("token", $token)->delete();
	}

	public function create( $dealer, $token, $request ) {
		
		$fullname = $request->firstname." ".$request->lastname;

		$user = (new User);

		$user->fullname 		= $request->fullname;
		$user->publicname 		= ($username = (explode('@', $request->email))[0]);
		$user->cellphone 		= $request->cellphone;
		$user->user 			= $username;
		$user->email 			= $request->email;
		$user->password 		= $request->pwd;
		$user->activated 		= 1;

		if( $user->save() ) {

			$user->saveMeta("info", "firstname", $request->firstname);
			$user->saveMeta("info", "lastname", $request->lastname);

			$user->orgSync($dealer->parent);
			$dealer->syncUser($user->id);

			$this->deleteToken( $token );

			Alert::prefix("system")->success(__("membership.register.successfull"));

			return redirect("login");
		}

		Alert::prefix("system")->error(__("membership.register.error"));

		return back();
	}


}

/* End of Controller Membership.php */