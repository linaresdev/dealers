<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Warranty\AjaxSupport;

class AjaxController extends Controller {

	public function __construct( AjaxSupport $support ) {	
		$this->boot($support);

		app("urls")->addTag("urls", [
			"__warranty"	=> "warranty/__s2",
			"__zone"	=> "__warranty/srczone"
		]);
	}

	public function index($org, $method, $args=null) {
		return $this->support->ajaxResponse( $org, $method, $args );
	}
}

/* End of Controller AjaxController.php */