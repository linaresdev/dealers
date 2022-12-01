<?php namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Home as HomeSupport;
use Delta\Http\Controllers\Controller;

class Home extends Controller {

	public function __construct( HomeSupport $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->render("home", $this->support->home());
	}
}

/* End of Controller Home.php */