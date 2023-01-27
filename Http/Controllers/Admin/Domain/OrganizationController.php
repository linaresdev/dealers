<?php 
namespace Delta\Http\Controllers\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Admin\OrganizationSupport;

class OrganizationController extends Controller {	
	public function __construct( OrganizationSupport $support ) {
		$this->boot($support);	
	}

	public function index( $org ) {
		return $this->render("organization", $this->support->index( $org ));
	}
}

/* End of Controller OrganizationController.php */