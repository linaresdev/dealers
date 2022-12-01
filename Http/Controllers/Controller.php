<?php
namespace Delta\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $support;

	protected $path = "delta::app.";

	public function boot( $support=null, $data=[] ) {
		$this->support = $support;

		$data["title"]       = "Theme Title";
		$data["language"]    = config("admin.locale");
		$data["charset"]     = config("admin.charset");

		if( method_exists($support, "share") ) {
			$data = array_merge($data, $support->share());
		}

		$this->share($data);
	}

	public function share($data) {
		if(!empty($data) && is_array($data) ) {
			view()->share($data);
		}
	}

	public function render($view=NULL, $data=[], $mergeData=[]) {

	if(view()->exists(($path = $this->path.$view))) {
	  return view($path, $data, $mergeData);
	}

	abort(500, "La vista {$path} no existe");
	}

}
