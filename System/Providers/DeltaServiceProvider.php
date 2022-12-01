<?php namespace Delta\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class DeltaServiceProvider extends ServiceProvider {
	
	public function boot() {
		require_once(__DEALER__."/Http/App.php");

	}

	public function register() {
		require_once(__DIR__."/../Common.php");
	}
}


/* End of providers DeltaServiceProvider.php */