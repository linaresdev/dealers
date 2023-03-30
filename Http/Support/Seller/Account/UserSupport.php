<?php 
namespace Delta\Http\Support\Seller\Account;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;

class UserSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;	
	}

	public function share( ) {
		

		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function index() {

		$data["title"] 	= __("words.account");
		$data["users"]	= $this->getUsersDelers();
		$data["layout"]	= "layout-sm";
		
		return $data;
	}

	public function getUsersDelers() {
		return $this->group->getOrgUsers("warranty");
	}

}

/* End of Controller UserSupport.php */