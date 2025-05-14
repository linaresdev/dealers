<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get('/', "WarrantyController@index");


Route::get("/show/{__WID}", "WarrantyController@show");

Route::prefix("{__orgID}")->group(function($route) {
    
	Route::get("/", "WarrantyController@home");
    Route::get("/search/{src}", "WarrantyController@searchWarranty");
    Route::get('/filter/{field}', "WarrantyController@filter");

    Route::get("/activate/{__WID}", "WarrantyController@activate");
    Route::get("/delete/{__WID}", "WarrantyController@delete");

    Route::get("/show/{wID}", "WarrantyController@show");

    Route::prefix("ajax")->group( function() {       
        Route::get("{opt}/{arg?}", "AjaxController@index");
    });   

    Route::get("/add", "WarrantyController@addWarranty");
    Route::post("/add", "WarrantyController@saveWarranty");

    Route::get("/srczone/{zone}", "WarrantyController@srcZone");
});


/* End of helper warranty.php */