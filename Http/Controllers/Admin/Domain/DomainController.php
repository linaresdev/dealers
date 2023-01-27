<?php
namespace Delta\Http\Controllers\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Admin\DomainSupport;
use Delta\Http\Request\Admin\Domain\CreateRequest;
use Delta\Http\Request\Admin\Domain\UpdateRequest;


class DomainController extends Controller {

	public function __construct( DomainSupport $support ) {
		$this->boot($support);	
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}

	public function toggleAccess( $org, $access ) {
		return $this->support->toggleAccess( $org, $access );
	}

	public function newDomain() {
		return $this->render("new", $this->support->new());
	}

	public function create(CreateRequest $request) {
		return $this->support->create($request);
	}

	public function editDomain($entity) {
		return $this->render("edit", $this->support->edit($entity));
	}
	public function updateDomain($org, UpdateRequest $request) {
		return $this->support->update( $org, $request );
	}

	public function delete($entity) {
		return $this->support->delete($entity);
	}
}

/* End of Controller EntityController.php */