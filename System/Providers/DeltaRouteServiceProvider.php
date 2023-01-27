<?php 
namespace Delta\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class DeltaRouteServiceProvider extends ServiceProvider {   
	
	protected $namespace = "Delta\Http\Controllers";

    public function boot() {
        parent::boot();
    }
    
    public function map() {

        if( (env("APP_STATE") == NULL) OR (env("APP_STATE") == false) ) {
            Route::namespace($this->namespace)->group(
                __DEALER__."/Http/Route/env.php"
            );
        }
        else {

            require_once(__DEALER__."/Http/binding.php");
                        
    		Route::middleware("iweb")->namespace($this->namespace)->group(
    			__DEALER__."/Http/Route/app.php"
    		);
        }
    }
}

/* End of providers DeltaRouteServiceProvider.php */