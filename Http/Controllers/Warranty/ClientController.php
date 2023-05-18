<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Warranty\ClientSupport;

class ClientController extends Controller {	

	public function __construct(ClientSupport $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->support->allPending();
	}
}

/* End of Controller ClientController.php */