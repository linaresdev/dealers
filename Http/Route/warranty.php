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

    Route::get("/add", "WarrantyController@addWarranty");
    Route::post("/add", "WarrantyController@saveWarranty");

    Route::get("/srczone/{zone}", "WarrantyController@srcZone");
});


/* End of helper warranty.php */