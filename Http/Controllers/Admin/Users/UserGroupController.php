<?php 
namespace Delta\Http\Controllers\Admin\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Admin\UserGroupSupport;

class UserGroupController extends Controller {

	public function __construct( UserGroupSupport $support ) {
		$this->boot($support);	
	}

	public function index() {
		return $this->render("groups.index", $this->support->index());
	}

	public function create() {
		return $this->render("groups.create", $this->support->create());
	}
}

/* End of Controller UserGroupController.php */