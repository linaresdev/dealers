<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Zona;

class Dealer {

	protected $user;

	public function __construct() {
	}

	public function share() {
		return [
			"layout" => "layout-sm"
		];
	}

	public function index( $user, $dealer ) {	
		
		$data["title"] 		= "Dealer";
		$data["user"]		= $user;
		$data["dealer"] 	= $dealer;
		$data["info"] 		= $dealer->datasheet();
		$data["customers"] 	= $dealer->customer;
		
		return $data;
	}

	public function zoneSrc( $src ) {
		$data["option"] = $this->queryZone($src);

		return $data;
	}

	public function queryZone( $src ) {
		return (new Zona)->where("description", "LIKE", "%".$src."%")
							->orWhere("code", "LIKE", "%".$src."%")
							->first() ?? null;
	}
}

/* End of providers Delta.php */