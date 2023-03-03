<?php 
namespace Delta\Http\Controllers\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Support\Admin\OrganizationSupport;
use Delta\Http\Request\Admin\Domain\RolRequest;
use Delta\Http\Request\Admin\Domain\UpdateRolRequest;

class OrganizationController extends Controller {

	public function __construct( OrganizationSupport $support ) {
		$this->boot($support);	
	}

	public function index( $org ) {
		return $this->render(
			"organization.rols", 
			$this->support->index( $org )
		);
	}

	public function create($org, RolRequest $request ) {
		return $this->support->create($org, $request);
	}

	public function editRol( $org, $rol ) {
		return $this->render(
			"organization.edit-rol", 
			$this->support->editRol( $org, $rol )
		);
	}

	public function updateRol( $org, $rol, UpdateRolRequest $request ) {
		return $this->support->updateRol($org, $rol, $request);
	}

	public function delete( $org, $ID ) {
		return $this->support->delete($org, $ID);
	}

	public function group( $org, $group) {
		return $this->render(
			"organization.groups", $this->support->group($org, $group)
		);
	}

	public function userDetach($org, $group, $ID ) {
		return $this->support->userDetach($org, $group, $ID);
	} 

	public function userToggleRol( $org, $group, $ID, $rol ) {
		return $this->support->userToggleRol( $org, $group, $ID, $rol);
	}

	public function users( $org ) {
		return $this->render(
			"organization.users", 
			$this->support->users( $org )
		);
	}

	public function srcUser( $org, $src ) {
		return $this->render(
			"organization.partial.users",
			$this->support->srcUser($org, $src)
		); 
	}

	public function addUserSrc( $org, $src, Request $request ) {
		return $this->support->addUserSrc($org, $request);
	}
	public function userDetachOrg($org, $usr ) {
		return $this->support->userDetachOrg($org, $usr);
	}

	public function searchUsers( $org, $rol, $src ) {
		return $this->render(
			"organization.partial.option",
			$this->support->searchUsers($org, $rol, $src)
		); 
	}

	public function addUserGroup( $org, $group, Request $request ) {
		return $this->support->addUserGroup($org, $group, $request);
	}
}

/* End of Controller OrganizationController.php */