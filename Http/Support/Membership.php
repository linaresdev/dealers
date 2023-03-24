<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Membership {

	protected $app;

	public function __construct() {	
	}

	public function dataFromToken($dealer, $token) { //dd(now()->create($token->expired)->diffForHumans());

		$data["title"] 	= "Membership";
		$data["dealer"] = $dealer;
		$data["guard"]	= $token;

		return $data;
	}


}

/* End of Controller Membership.php */