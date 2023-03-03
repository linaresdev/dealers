<?php 
namespace Delta\Http\Support\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class WarrantySupport {

	public function __construct() {	
	}

	public function index() {

		$data["title"] = __("words.warranty");

		return $data;
	}

	public function home( $org ) {

		$data["title"] = $org->group;

		return $data;
	}

}

/* End of Controller HomeSupport.php */