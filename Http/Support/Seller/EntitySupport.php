<?php 
namespace Delta\Http\Support\Seller;

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
		$data["ent"]		= $ent;		
		$data["layout"]		= "layout-sm";
		$data["users"]		= $ent->users;

		$data["users_on"] 	= $ent->users()->where("activated", 1)->count();
		$data["users_off"] 	= $ent->users()->where("activated", 0)->count();

		$data["warranties"]	= $ent->customer;
		$data["warranties_on"]	= $ent->customer->where("activated", 1)->count();
		$data["warranties_off"]	= $ent->customer->where("activated", 0)->count();

		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}
}

/* End of Controller EntitySupport.php */