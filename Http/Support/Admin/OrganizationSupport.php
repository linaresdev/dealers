<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;

class OrganizationSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;
	}

	public function index( $org ) {
		$data["title"] = $org->group;
		$data["brand"] = "mdi-".$org->icon;

		return $data;
	}
}