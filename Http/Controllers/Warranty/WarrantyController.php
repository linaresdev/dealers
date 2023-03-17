<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Warranty\WarrantySupport;
use Delta\Http\Request\Warranty\RegisterRequest;

class WarrantyController extends Controller {

	public function __construct( WarrantySupport $support ) {
		$this->boot($support);	

		app("urls")->addTag("urls", [
			"__zone"	=> "warranty/__s2/srczone"
		]);
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}

	public function home($org) {
		return $this->render("home", $this->support->home($org));
	}

	public function addWarranty( $org ) {
		return $this->render(
			"add-warranty", $this->support->addWarranty($org)
		);
	}

	public function saveWarranty( $org, RegisterRequest $request ) {
		return $this->support->saveWarranty($org, $request, $this->user());
	}

	public function srcZone( $org, $src ) {		
		return $this->render(
			"partial/zone", $this->support->srcZone($org, $src)
		);
	}
}

/* End of Controller HomeController.php */