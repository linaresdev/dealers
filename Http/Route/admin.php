<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@home");

Route::get("/sluggable/{slug}", "AjaxController@sluggable");

Route::prefix("/organizations")->namespace("Domain")->group(function($route){
    Route::get("/", "DomainController@index");

    Route::get("/toggle/{__dm}/{access}", "DomainController@toggleAccess");

    Route::get("/new", "DomainController@newDomain");
    Route::post("/new", "DomainController@create");

    Route::get("/edit/{id}", "DomainController@editDomain");
    Route::post("/edit/{id}", "DomainController@updateDomain");

    Route::get("/delete/{id}", "DomainController@delete");

    Route::prefix("{__slug}")->group( function($route) {
        Route::get('/', "OrganizationController@index");
        Route::post('/', "OrganizationController@create");

        Route::get("rol/{idRol}", "OrganizationController@group");
        Route::get('/rol/{idRol}/search/{src}',"OrganizationController@searchUsers");

        Route::get('/rol/{idRol}/detach/{usrID}',"OrganizationController@userDetach");
        Route::get('/rol/{idRol}/toggle/{usrID}/{rol}',"OrganizationController@userToggleRol");

        Route::post('/rol/{idRol}/add-user',"OrganizationController@addUserGroup"); 

        Route::get('/rol/{id}/delete', "OrganizationController@delete");

    });
});

Route::prefix("/users")->namespace("Users")->group( function($route) {
    Route::get("/", "UserController@index");

    Route::get("config/{key}/{value}", "UserController@config");

    ## Register Users
    Route::get("/register", "UserController@register");
    Route::put("/register", "UserController@create");

    ## User Group
    Route::prefix("groups")->group( function() {
        Route::get('/', "UserGroupController@index");
        Route::post('/new', "UserGroupController@create");
    });    
});