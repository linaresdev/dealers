<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Portada;

class PortadaController extends Controller {

	public function __construct( Portada $support ) {
		$this->boot($support);
	}

	public function home() {
		return $this->render("home", $this->support->home());
	}

	public function nosotros() {
		return $this->render("nosotros", $this->support->nosotros());
	}

	public function contactos() {
		return $this->render("contactos", $this->support->contactos());
	}
}

/* End of Controller PortadaController.php */