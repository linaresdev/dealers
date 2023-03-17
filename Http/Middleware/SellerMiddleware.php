<?php 
namespace Delta\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {

        if( ($auth = Auth::guard($guard))->check() ) {
            
        }

        return $next($request);
    }

}

/* End of Library SellerMiddleware.php */