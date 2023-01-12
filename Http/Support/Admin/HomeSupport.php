<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class HomeSupport {	

	protected $app;

	public function __construct() {
	}

	public function share() {
		return [
			"layout" => "layout-lg"
		];
	}

	public function home() {
		$data['title'] = __("words.administration");

		return $data;
	}
}

/* End of Controller HomeSupport.php */