<?php

Route::get("/", "PortadaController@home");

Route::get("/nosotros", "PortadaController@nosotros");

Route::get("/contactos", "PortadaController@contactos");


Route::get("/login", "LoginController@index");
Route::post("/login", "LoginController@attempt");

Route::get("/logout", "LoginController@logout");

Route::prefix("membership")->middleware("web")->group( function() {
	Route::get("/from/{dealer}/{token}","MembershipController@fromToken");
	Route::post("/from/{dealer}/{token}","MembershipController@create");
});

Route::prefix("profiler")->middleware("web")->group(
	__DEALER__."/Http/Route/profile.php"
);

Route::prefix(config("admin.slug"))->namespace("Admin")->group(
	__DEALER__."/Http/Route/admin.php"
);

Route::prefix("seller")->middleware("seller")->namespace("Seller")->group(
	__DEALER__."/Http/Route/sellers.php"
);

Route::prefix("warranty")->middleware("warranty")->namespace("Warranty")->group(
	__DEALER__."/Http/Route/warranty.php"
);

