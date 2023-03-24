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

class WarrantyMiddleware {

	protected $exerts = [
	];

    public function handle($request, Closure $next, $guard = "web") {

        if( ($auth = Auth::guard($guard))->check() ) {
            $user = $auth->user();

            if( ($warranty = $user->org("warranty")) == null ) {

                Alert::prefix("system")->warning( __("access.deny") );

                return redirect("/");
            }
            else {                
                $access=[];

                $nav["index"]             = 8;
                $nav["filters"]["node0"]  = "nav flex-column";

                if( ($main = ($user = auth("web")->user())->org("warranty")) != null ) {
                    foreach($user->orgParents($main->id) as $row ) {

                        $access[] = $row->id;

                        $item["icon"]   = $row->icon;
                        $item["label"]  = $row->group;
                        $item["url"]    = "warranty/".$row->id;

                        $nav["items"][] = $item;
                    }                    
                }
                else{
                    $nav["items"] = [];
                }

                view()->share([
                    "nav" => $nav,
                    "layout"    => "layout-sm"
                ]);

                if( count(__segment()) > 1 ) {
                    if(!in_array(__segment(2), $access) )  {
                        Alert::prefix("system")->warning( __("access.deny") );
                        return redirect("/");
                    }                    
                }
            }
        }

        return $next($request);
    }
}

/* End of Library WarrantyMiddleware.php */