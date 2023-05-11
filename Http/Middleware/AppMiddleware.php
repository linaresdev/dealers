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

class AppMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "app") {

    	if( !Auth::guard($guard)->attempt($request->only(["email", "password"])) ) {
    		abort(403, "Forbidden Api");
		}

		return $next($request);
    }

}

/* End of Library AppMiddleware.php */