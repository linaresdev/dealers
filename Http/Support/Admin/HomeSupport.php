<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;

class HomeSupport {	

	protected $user;

	public function __construct( User $user) {
		$this->user = $user;
	}

	public function share() {
		return [
			"layout" => "layout-md"
		];
	}

	public function getUser($perpage=10) {
		$data = $this->user->orderBY("id", "DESC");

		return $data->paginate($perpage);
	}

	public function home() {
		$data['title'] 	= __("words.administration");
		$data["users"]	= $this->getUser();

		return $data;
	}
}

/* End of Controller HomeSupport.php */