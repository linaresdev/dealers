<?php 
namespace Delta\Menu\Provider;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider {

	public function boot() {
		require_once(__DIR__."/../Helper.php");
	}

	public function register() {
		$this->app->bind( "Menu", function($app) {
		  return new \Delta\Menu\Support\Factory($app);
		});
	}
}


/* End of providers MenuServiceProvider.php */