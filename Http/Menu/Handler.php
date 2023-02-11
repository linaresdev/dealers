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
			\Delta\Http\Menu\AdminNav::class,
			\Delta\Http\Menu\WarrantyNav::class,
			\Delta\Http\Menu\SellerNav::class,
		];
	}
}

/* End of Controller Handler.php */