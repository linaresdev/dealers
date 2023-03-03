<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;

class DomainSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;
	}

	public function getOrganization($perpage) {

		$data = $this->group->where("type", "organization");
		$data->orderBY("id", "DESC");

		return $data->paginate($perpage);
	}

	public function share() {
		return [
			"layout"	=> "layout-md",
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

		$data["title"] 		= __("words.organizations");
		$data["brand"] 		= "mdi-domain";
		$data["domains"]	= $this->getOrganization(10);

		return $data;
	}

	public function toggleAccess($org, $access) {
		$org->access = $access;
		$org->save();

		return back();
	}

	public function new() {

		$data["title"] 		= __("organization.new");
		$data["brand"] 		= "mdi-domain-plus";

		return $data;
	}

	public function create( $request ) {
		
		$this->group->create([
			"type" 	=> "organization", 
			"group" => $request->group,
			"slug"	=> \Str::slug($request->group),
			"access" => $request->access,
			"icon"	=> $request->icon
		]);

		return __back('__organization');
	}

	public function edit( $org ) {

		$data["title"] 		= __("organization.update");
		$data["brand"] 		= "mdi-bank";
		$data["org"]		= $org;

		return $data;
	}

	public function update($org, $request) {
		$org->group = $request->group;
		$org->slug 	= \Str::slug($org->group);

		if( $org->save() ) {
			return __back("__admin/organizations");
		}

		return back();
	}

	public function delete($org) {
		$org->delete();

		return back();
	}
}

/* End of Controller EntitySupport.php */