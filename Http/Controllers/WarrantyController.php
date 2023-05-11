<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Customer;
use Illuminate\Http\Request;
use Delta\Http\Support\Warranty;

class WarrantyController extends Controller {

	public function __construct( Warranty $support ) {
		$this->boot($support);
	}

	public function index() {
		return $this->support->getWarantyPending();
	}

	public function terminate($warranty) {
		return $this->support->terminateProcesWarranty($warranty);
	}

	public function store( Request $request ) {
		return $this->support->getWarantyPending();
	}
}

/* End of Controller WarrantyController.php */