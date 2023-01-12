<?php 
namespace Delta\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Skin {

	protected $slug;
	
	public function __construct($slug) {
		$this->slug = $slug;	
	}

	public function path($path='master') {
		return "$this->slug::$path";
	}

	public function render($view=NULL, $data=[], $mergeData=[]) {
		
		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}

	public function layout($key) {
		if( in_array($key, ["lg", "md", "sm"]) ) {
			return $this->slug."-$key";
		}
	}

	public function show($slug=null) {
		return false;
	}
}

/* End of Controller Skin.php */