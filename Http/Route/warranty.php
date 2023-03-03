<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get('/', "WarrantyController@index");

Route::prefix("{__orgID}")->group(function($route) {
	Route::get("/", "WarrantyController@home");
});


/* End of helper warranty.php */