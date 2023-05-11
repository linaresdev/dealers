<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Zona;

use Delta\Model\Customer;
use Illuminate\Support\Facades\Auth;

class Warranty {

	protected $store;

	public function __construct( Customer $store ) {
		$this->store = $store;
	}

	public function getWarantyPending() {
		return $this->store->where("state", 1)->get();
	}

	public function terminateProcesWarranty( $warranty ) {
		return $warranty;
	}

	public function store() {
		return 22;
	}
}

/* End of Controller Warranty.php */