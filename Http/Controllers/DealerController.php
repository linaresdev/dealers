<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Delta\Http\Support\Dealer;

class DealerController extends Controller {

	public function __construct( Dealer $support ) {
		$this->boot($support);
	}

	public function index( $dealer ) {
		return $this->render(
			"dealers.home", $this->support->index(auth()->user(), $dealer ) 
		);
	}

	public function zoneSrc( $src=null ) {
		return $this->render(
			"dealers.ajax.zone", $this->support->zoneSrc($src)
		);
	}
}

/* End of Controller DealerController.php */