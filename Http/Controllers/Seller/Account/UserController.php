<?php 
namespace Delta\Http\Controllers\Seller\Account;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Seller\Account\UserSupport;

class UserController extends Controller {

	public function __construct( UserSupport $support ) {
		$this->boot($support);	
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}
}

/* End of Controller UserController.php */