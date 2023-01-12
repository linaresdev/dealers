<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class Navbar extends Accessor {

	protected $tag 		= "navbar";

	protected $area 	= "navbar-0";

	public function __construct( ) {
	}

	public function items( $index=4 ) {
		return "mi menu";
	}
}

/* End of Controller Navbar.php */