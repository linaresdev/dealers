<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Membership;
use Delta\Http\Request\Seller\MailMembershipRequest;

class MembershipController extends Controller {	

	public function __construct( Membership $support ) {	
		$this->boot($support);
	}

	public function fromToken($dealer,$token ) {
		return $this->render(
			"sellers.mailers.register.mailmembership",
			$this->support->successFromToken($dealer, $token)
		);
	}

	public function create( $dealer, $token, MailMembershipRequest $request ) {
		return $this->support->create( $dealer, $token, $request );
	}
}

/* End of Controller MembershipController.php */