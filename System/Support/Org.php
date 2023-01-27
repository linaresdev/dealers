<?php 
namespace Delta\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Org {	

	protected $group;

	protected $sections = []; 

	public function __construct($app) {	

		$this->group = $app["db"]->table("users_groups");	
	}

	public function load() {

		## ORGANIZATIONS
		if(env("APP_STATE")){
			foreach( $this->group->where("type", "organization")->get() as $row ) {
				$this->addSection([
					"slug"	=> $row->slug,
					"description" => $row->group,
					"access"	=> $row->access
				]);
			} 
		}

		return $this;
	}

	public function addSection( $data ) {
		$this->sections[] = $data;
	}

	
	public function getSections() {
		return $this->sections;
	}

}

/* End of Controller Org.php */