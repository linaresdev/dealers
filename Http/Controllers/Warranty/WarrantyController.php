<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Warranty\WarrantySupport;

class WarrantyController extends Controller {

	public function __construct( WarrantySupport $support ) {
		$this->boot($support);	
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}

	public function home($org) {
		return $this->render("home", $this->support->home($org));
	}
}

/* End of Controller HomeController.php */