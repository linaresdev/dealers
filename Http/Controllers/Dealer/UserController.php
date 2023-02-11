<?php 
namespace Delta\Http\Controllers\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Dealer\UserSupport;

class UserController extends Controller {	

	public function __construct( UserSupport $support ) {
		$this->boot($support);	
	}

	public function index($dealer) {
		return $this->render("users.index", $this->support->index($this->user(), $dealer));
	}
}

/* End of Controller UserController.php */