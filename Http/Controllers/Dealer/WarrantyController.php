<?php 
namespace Delta\Http\Controllers\Dealer\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class WarrantyController extends Controller {

	public function __construct( WarrantySupport $support ) {	
		$this->boot("$support")
	}

	public function index() {
		return 'Info';
	}
}

/* End of Controller WarrantyController.php */