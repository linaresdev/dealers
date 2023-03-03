<?php

Route::get("/", "PortadaController@home");

Route::get("/nosotros", "PortadaController@nosotros");

Route::get("/contactos", "PortadaController@contactos");


Route::get("/login", "LoginController@index");
Route::post("/login", "LoginController@attempt");

Route::get("/logout", "LoginController@logout");

Route::prefix("account")->middleware("web")->namespace("Account")->group(
	__DEALER__."/Http/Route/account.php"
);

Route::prefix(config("admin.slug"))->namespace("Admin")->group(
	__DEALER__."/Http/Route/admin.php"
);

Route::prefix("seller")->middleware("seller")->namespace("Seller")->group(
	__DEALER__."/Http/Route/sellers.php"
);

// Route::prefix("dealers")->middleware("dealer")->namespace("Dealer")->group(
// 	//__DEALER__."/Http/Route/dealer.php"
// );

Route::prefix("warranty")->middleware("warranty")->namespace("Warranty")->group(
	__DEALER__."/Http/Route/warranty.php"
);

