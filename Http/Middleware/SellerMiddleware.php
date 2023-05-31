<?php 
namespace Delta\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Delta\Alert\Facade\Alert;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {
        
        if( ($auth = Auth::guard($guard))->check() ) {
            $user = $auth->user();
            
            if( ($seller = $user->org("seller")) == null ) {

                Alert::prefix("system")->warning( __("access.deny") );

                return redirect("/");
            }
        }

        return $next($request);
    }

}

/* End of Library SellerMiddleware.php */