<?php 
namespace Delta\Http\Support\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class UserSupport {

	public function __construct() {
	}

	public function index($user, $dealer) {		

		$data["title"] 		= __("words.users");
		$data["user"]		= $user;
		$data["dealer"] 	= $dealer;

		return $data;
	}
}

/* End of Controller WarrantySupport.php */