<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Handler {	
	
	public function menu() {
		return [
			\Delta\Http\Menu\App::class,
			\Delta\Http\Menu\AdminNav::class
		];
	}
}

/* End of Controller Handler.php */