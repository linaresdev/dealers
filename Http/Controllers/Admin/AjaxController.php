<?php
namespace Delta\Http\Controllers\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Admin\AjaxSupport;

class AjaxController extends Controller {

	public function __construct( AjaxSupport $support ) {	
		$this->boot($support);
	}

	public function sluggable($slug) {
		return $this->support->sluggable($slug);
	}
}

/* End of Controller AjaxController.php */