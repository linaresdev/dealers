<?php 
namespace Delta\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Delta\Menu\Facade\Menu;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware {

	protected $exerts = [
		"/",
        "login",
        "logout",
        "nosotros",
        "contactos"
	];

    public function handle($request, Closure $next, $guard = "web") {

        $auth = Auth::guard($guard);
        $user = $auth->user();

    	if( $this->stableApp() ) return redirect("install");

        if( Auth::guard($guard)->guest() ) {
            foreach( app('org')->getSections() as $org ) {
                if( __segment(1, $org["slug"]) && ($org["access"] == 1) ) {
                    return redirect("login");
                }
            }
        }

        if( $auth->check() ) {
            require_once(__DEALER__."/Http/auth.php");            
        }

        return $next($request);
    }

    public function stableApp() {

    	$state 		= (env("APP_STATE") == false);
    	$isInstall 	= (__segment(1, "install") == false);

        if( $state && $isInstall ) {
            return true;
        }

        return false;
    }

    public function listenerWebAccess( $request, $guard ) {

        $isAuth     = Auth::guard($guard)->guest();
        $isExert    = in_array($request->path("/"), $this->exerts);
        
        if( $isAuth && !$isExert ) {
        	return true;
        }
        
        return false;
    }

    public function getOrganizations() {

        $group = app("db")->table("users_groups");
        $group->where("type", "organization");

        return $group->get() ?? NULL;
    }

}

/* End of Library LoginMiddleware.php */