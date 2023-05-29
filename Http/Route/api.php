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

Route::middleware('auth:sanctum')->group(function() {
    Route::get("/warranty", "Warranty\WapiController@warranties");
    Route::get("/close", "Warranty\WapiController@close");

    Route::get("/logout", "Warranty\WapiController@logout");
});