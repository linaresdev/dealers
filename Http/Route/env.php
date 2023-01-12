<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


Route::prefix("install")->middleware("web")->namespace("Install")->group(function($route) {

	Route::get("/", "InstallController@index");
	Route::get("/accept-term", "InstallController@confirmTerm");

	Route::get("/env", "InstallController@env");
	Route::post("/env", "InstallController@envUpdate");

	Route::prefix("database")->group(function($route){
		Route::get("/", "InstallController@database");	
		Route::post("/", "InstallController@close");	

		Route::get("/forge/{opt?}", "InstallController@forge");

	});

});