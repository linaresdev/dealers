<?php 
namespace Delta\Http\Support\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class WarrantySupport {

	public function __construct() {
	}

	public function index( $org ) {

		$data["title"] 	= __("words.warranty");
		$data["ent"]	= $org;

		return $data;
	}
}

/* End of Controller WarrantySupport.php */