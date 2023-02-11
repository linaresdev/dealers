<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


Route::get("/", "DealerController@index");

Route::get("/register", "DealerController@register");
Route::post("/register", "DealerController@create");

Route::get("/update/{__orgID}", "DealerController@edit");
Route::post("/update/{__orgID}", "DealerController@update");

Route::get("/update/{__orgID}/logo", "DealerController@editLogo");
Route::post("/update/{__orgID}/logo", "DealerController@updateLogo");

Route::prefix("{__orgID}/users")->group(function($route){
    Route::get("/", "UserController@index");
});