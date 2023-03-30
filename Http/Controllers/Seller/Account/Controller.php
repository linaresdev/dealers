<?php 
namespace Delta\Http\Controllers\Seller\Account;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Delta\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController {

	protected $path = "delta::app.sellers.account.";

    public function parseData($data) {

        $data["layout"] = "layout-md";
       
        return $data;
    }
}
