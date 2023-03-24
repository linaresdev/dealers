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

class DealerMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {
        
        // $auth   = Auth::guard("web");
        // $user   = $auth->user(); 

        // if( !$user->isRol("dealers") ) {
        //     Alert::prefix("system")->danger(__("access.deny"));

        //     return redirect("/");
        // } else {
        //     $dealer = $user->org("dealers");

        //    // dd($dealer->rols());
            
        //     if( !$user->hasRol("seller") ) {
        //         Alert::prefix("system")->info(__("dealer.redirect"));
        //         return redirect("dealers/warranty");
        //     }
        // }

        return $next($request);
    }


}

/* End of Library DealerMidleware.php */