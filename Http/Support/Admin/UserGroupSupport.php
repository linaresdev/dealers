<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/



use Delta\Model\Group;

class UserGroupSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;
	}

	public function getGroups($perpage=10) {
		$data = $this->group->orderBY("id", "DESC");

		return $data->paginate($perpage);
	}

	public function share() {

		return [
			"layout" => "layout-md",
			"hasError" => function($name) {
				if( session()->has("errors") ) {
					$errors = session()->get("errors");

					return $errors->first(
						$name, 
						'<p class="error"> :message </p>'
					);
				}
			}
		];
	}

	public function index() {

		$data["title"] 		= __("words.groups");
		$data["groups"] 	= $this->getGroups();

		return $data;
	}

	public function create() {

		$data["title"] 		= __("group.new");

		return $data;
	}
}

/* End of providers UserGroupSupport.php */