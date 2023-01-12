<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Portada {	

	protected $app;

	public function __construct( ) {
	}

	public function home() {
		
		$data["title"] 	= __("words.home");
		$data["layout"] = "layout-sm";

		return $data;
	}

	public function nosotros() {

		$data["title"] = "Nosotros";

		return $data;
	}

	public function contactos() {

		$data["title"] = "Contactos";
		
		return $data;
	}
}

/* End of Controller Portada.php */