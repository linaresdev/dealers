<?php 
namespace Delta\Http\Support\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class EntitySupport {

	protected $app;

	public function __construct( ) {
	}

	public function index($ent) {

		$data["title"] 		= __("words.entities");		
		$data["layout"]		= "layout-md";
		$data["ent"]		= $ent;
		$data["users"]		= $ent->users;

		return $data;
	}
}

/* End of Controller EntitySupport.php */