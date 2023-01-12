<?php 
namespace Delta\Themes\Lighter;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use Illuminate\Support\Facades\Auth;

class Director {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {

    	$data["layout"] = config("lighter.layout", "layout-lg");
    	$data["style"] 	= config("lighter.style", "style-light");

    	$data["current"] = function($path) {
    		if($path == request()->path()) return ' active';
    	};

    	view()->share($data);

        return $next($request);
    }

}

/* End of Library Middleware.php */