<?php 
namespace Delta\Http\Controllers\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Delta\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController {

	protected $path = "delta::app.sellers.";

    public function parseData($data) {

        $data["layout"] = "layout-md";
       
        return $data;
    }
}
