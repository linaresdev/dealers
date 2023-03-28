<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/




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
		
		return $data;
	}


}

/* End of Controller Membership.php */