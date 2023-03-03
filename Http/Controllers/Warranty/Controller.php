<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController {

	protected $path = "delta::app.warranties.";

	public function parseData($data) {

		$data["layout"] = "layout-md";

		return $data;
	}
}

/* End of Controller Controller.php */