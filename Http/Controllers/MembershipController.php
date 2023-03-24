<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Membership;

class MembershipController extends Controller {	

	public function __construct( Membership $support ) {	
		$this->boot($support);
	}

	public function fromToken($dealer, $token ) {
		return $this->support->dataFromToken( $dealer, $token );
	}
}

/* End of Controller MembershipController.php */