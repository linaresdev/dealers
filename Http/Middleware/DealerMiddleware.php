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

class DealerMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {
        
        $auth   = Auth::guard("web");
        $user   = $auth->user();        

        if( __segment(1, "dealer") && !$user->isRol("dealers") ) {
            return redirect("/");
        }
        else {
            if( empty( $dealer = $user->dealer()) ) {
                return redirect("/");
            }
        }

        return $next($request);
    }


}

/* End of Library DealerMidleware.php */