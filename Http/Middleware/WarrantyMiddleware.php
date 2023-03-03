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

class WarrantyMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {
        return $next($request);
    }
}

/* End of Library WarrantyMiddleware.php */