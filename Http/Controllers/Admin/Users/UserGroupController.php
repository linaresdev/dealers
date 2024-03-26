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

	public function getShowGroup( $group )
	{
		return $this->render("groups.show", $this->support->getShowGroup($group));
	}

	public function toggleUserRol($group, $user, $rol )
	{
		return $this->support->toggleUserRol($group, $user, $rol);
	}
}

/* End of Controller UserGroupController.php */