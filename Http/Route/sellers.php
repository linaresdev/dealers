<?php

/*
 *---------------------------------------------------------
 * © Delta Comercial, S. A.
 *---------------------------------------------------------
*/

Route::get("/", "SellerController@index");

Route::get("/search/{src}", "SellerController@search");

Route::get("/register", "SellerController@register");
Route::post("/register", "SellerController@create");

Route::get("/update/{__orgID}", "SellerController@edit");
Route::post("/update/{__orgID}", "SellerController@update");

Route::get("/update/{__orgID}/logo", "SellerController@editLogo");
Route::post("/update/{__orgID}/logo", "SellerController@updateLogo");

Route::get("/delete/{__orgID}", "SellerController@delete");

Route::prefix("account")->namespace("Account")->group( function($route) {
    Route::get("/", "UserController@index");
});

Route::prefix("entity")->group( function($route) {
    Route::prefix("{__orgID}")->group( function($route) {

        Route::get("/", "EntityController@index");

         /*
        * Administracion de los usuarios y permisos */
        Route::prefix("users")->group(function($route) {
            Route::get("/", "UserController@index");    

            ## Agregar usuarios
            Route::get("/add", "UserController@add");
            Route::get("/add/{src}", "UserController@ajaxUsers");

            Route::get("/sync/{id}", "UserController@syncUser");
            Route::get("/detach/{id}", "UserController@detachUser");

            Route::post("/add", "UserController@userAdd");

            ## Registro Local
            Route::get("/register", "UserController@register");
            Route::post("/register", "UserController@userCreate");

            ## Registro via corre
            Route::get("/send/register", "UserController@createFromSendMail");
            Route::post("/send/register", "UserController@registerFromSendMail");
            
            Route::get("/{__usrID}", "UserController@info");

            ## Authorize
            Route::get("/{__usrID}/rol", "UserController@rol");
            Route::post("/{__usrID}/rol", "UserController@rolUpdate");
        });

    });   
});