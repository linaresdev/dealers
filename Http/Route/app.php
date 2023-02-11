<?php

Route::get("/", "PortadaController@home");

Route::get("/nosotros", "PortadaController@nosotros");

Route::get("/contactos", "PortadaController@contactos");


Route::get("/login", "LoginController@index");
Route::post("/login", "LoginController@attempt");

Route::get("/logout", "LoginController@logout");

Route::prefix(config("admin.slug"))->namespace("Admin")->group(
	__DEALER__."/Http/Route/admin.php"
);

Route::prefix("dealers")->middleware("dealer")->namespace("Dealer")->group(
	__DEALER__."/Http/Route/dealer.php"
);

// Route::prefix("dealer")->middleware("dealer")->group( function($route) {
	
// 	/*
// 	* Ajax */
// 	Route::get("/ajax/zone/{zone?}", "DealerController@zoneSrc");

// 	/*
// 	* Dealer */
// 	Route::get("/{__dealer}", "DealerController@index");
// 	/*
// 	* Clients */
// 	Route::get("/{__dealer}/warranty/info/{__cid}", "WarrantyController@info");

// 	Route::get("/{__dealer}/warranty/add", "WarrantyController@add");
// 	Route::post("/{__dealer}/warranty/add", "WarrantyController@register");

// 	Route::get("/{__dealer}/warranty/edit/{__cid}", "WarrantyController@edit");
// 	Route::post("/{__dealer}/warranty/edit/{__cid}", "WarrantyController@update");

// 	Route::get("/{__dealer}/warranty/delete/{__cid}", "WarrantyController@delete");
// });

