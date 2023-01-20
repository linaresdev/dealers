<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@home");

Route::prefix("/users")->namespace("Users")->group( function($route) {
    Route::get("/", "UserController@index");

    Route::get("config/{key}/{value}", "UserController@config");

    ## Register Users
    Route::get("/register", "UserController@register");
    Route::put("/register", "UserController@create");
    
});