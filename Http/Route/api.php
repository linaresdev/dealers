<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/



Route::prefix("warranty")->middleware("app")->group(function(){

	Route::get("/", "WarrantyController@index");
	Route::get("/terminate/{job}", "WarrantyController@terminate");

	Route::post("/", "WarrantyController@store");

});