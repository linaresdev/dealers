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
        Route::get('/rol', "OrganizationController@index");
        Route::post('/rol', "OrganizationController@create");

        Route::get("rols/{idRol}", "OrganizationController@group");
        Route::get('/rols/{idRol}/search/{src}',"OrganizationController@searchUsers");

        Route::get('/rol/{idRol}/detach/{usrID}',"OrganizationController@userDetach");
        
        Route::get('/rol/{idRol}/toggle/{usrID}/{rol}',"OrganizationController@userToggleRol");

        Route::post('/rols/{idRol}/add-user',"OrganizationController@addUserGroup"); 

        Route::get('/rol/{idRol}/edit', "OrganizationController@editRol");
        Route::post('/rol/{idRol}/edit', "OrganizationController@updateRol");

        Route::get('/users', "OrganizationController@users");
        Route::get('/users/{__uID}/detach', "OrganizationController@userDetachOrg");

        Route::get('/users/search/{src}', "OrganizationController@srcUser");
        Route::post('/users/search/{src}', "OrganizationController@addUserSrc");

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