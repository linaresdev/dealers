<?php 
namespace Delta\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class DeltaRouteServiceProvider extends ServiceProvider {   
	
    public const HOME = '/home';

	protected $namespace = "Delta\Http\Controllers";

    public function boot() {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Route::middleware('api')
            //     ->prefix('api')
            //     ->group(__DEALER__."/Http/Route/api.php");

            if( (env("APP_STATE") == NULL) OR (env("APP_STATE") == false) ) {
                Route::namespace($this->namespace)->group(
                    __DEALER__."/Http/Route/env.php"
                );
            }
            else {

                /*
                * Route Bind */
                require_once(__DEALER__."/Http/binding.php");
                
                /*
                * Routes Api Web */
                $this->apiRoutes("Delta\Http\Controllers");

                /*
                * Routes Web */
                $this->webRoutes("Delta\Http\Controllers");               
            }
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    public function webRoutes($namespace) {
        Route::middleware("iweb")->namespace($namespace)->group(
            __DEALER__."/Http/Route/app.php"
        );
    }

    public function apiRoutes($namespace) {        
        Route::middleware('api')
                ->prefix('api')
                ->namespace($namespace)
                ->group(__DEALER__."/Http/Route/api.php");
    }
}

/* End of providers DeltaRouteServiceProvider.php */