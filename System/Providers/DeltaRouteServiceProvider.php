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
                        
    		/*
            * Routes Web */
            $this->webRoutes("Delta\Http\Controllers");

            /*
            * Api Rotes */
            $this->apiRoutes("Delta\Http\Controllers");
        }
    }

    public function webRoutes($namespace) {
        Route::middleware("iweb")->namespace($namespace)->group(
            __DEALER__."/Http/Route/app.php"
        );
    }

    public function apiRoutes($namespace) {        
        Route::prefix("app")->namespace($namespace)->group(
            __DEALER__."/Http/Route/api.php"
        );
    }
}

/* End of providers DeltaRouteServiceProvider.php */