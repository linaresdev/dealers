<?php 
namespace Delta\Http\Controllers\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Admin\HomeSupport;

class HomeController extends Controller {	

	public function __construct( HomeSupport $app ) {	
		$this->boot($app);
	}

	public function home() {
		return $this->render("home", $this->support->home());
	}
}

/* End of Controller HomeController.php */