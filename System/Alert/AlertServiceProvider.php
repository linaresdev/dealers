<?php 
namespace Delta\Alert;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Alert\Facade\Alert;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__.'/Views', "alert");
	}

	public function register() {
		$this->app->bind("Alert", function( $app ){
			return new \Delta\Alert\Store($app);
		});
	}
	
}


/* End of providers AlertServiceProvider.php */