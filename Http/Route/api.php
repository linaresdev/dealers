<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::post("login", "Warranty\WapiController@login");

Route::middleware('auth:sanctum')->group(function(){
    Route::get("/warranty", "Warranty\WapiController@index");

    Route::get("/logout", "Warranty\WapiController@logout");
});

// Route::prefix("warranty")->middleware("app")->group(function(){

// 	Route::get("/", "WarrantyController@index");
// 	Route::get("/terminate/{job}", "WarrantyController@terminate");

// 	Route::post("/", "WarrantyController@store");

// });