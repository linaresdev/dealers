<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@home");

Route::get("/report", function(){

    $Delta = (new \Delta\Model\Group)->find(11)->customer()->where("state", 0)->get();

    // foreach( $Delta as $row ) {
    //     $row->update(["state" => 1]);
    // }

    dd($Delta);

    $group = (new \Delta\Model\Group)->where("type", "dealer")->get();
    $data["title"] = "Reporte";

    foreach($group as $row) {
        $dealer = $row->group;

        $total = $row->customer->count();
        $close = $row->customer()->where("state", 2)->count();
        
        $data["dealers"][] = [
            "ID"    => $row->id,
            "name"  => $row->group,
            "total" => $total,
            "close" => $close
        ];
    }

    return view("delta::admin.reporte", $data);
});

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

    Route::prefix("{__usrID}")->group(function($route){ 

        Route::prefix("update")->group(function() {
            Route::get("credential", "UserController@credential");
            Route::post("credential", "UserController@credentialUpdate");

            Route::get("password", "UserController@password");
            Route::post("password", "UserController@passwordUpdate");
        });

        Route::get("password/expired", "UserController@passwordExpire");
        Route::post("password/expired", "UserController@passwordExpireCreate");
        
        Route::get(
            "password/expired/{id}/delete", "UserController@passwordExpireDelete"
        );

        Route::get("/send/password/reset", "UserController@sendPasswordReset");

        Route::get("delete", "UserController@delete");
        Route::get("delete/forever", "UserController@deleteForever"); 
        
        Route::prefix("groups")->group( function($route){
            Route::get('/', "UserGroupController@index");
        });
    });

    Route::get("/set/{__usrID}/{state}", "UserController@setUser");

    Route::get("config/{key}/{value}", "UserController@config");

    ## Register Users
    Route::get("/register", "UserController@register");
    Route::put("/register", "UserController@create");

    ## User Group
    Route::prefix("groups")->group( function() {
        Route::get('/', "UserGroupController@index");
        Route::post('/new', "UserGroupController@create");  
        
        Route::prefix("{__gID}")->group(function($route)
        {
            Route::get("/", "UserGroupController@getShowGroup");
            Route::get("/toggle/{__usrID}/{rol}", "UserGroupController@toggleUserRol");
        });
    });    
});

#Route::prefix("apps")->namespace("Apps")->group( function() {

    // Route::get("/", "AppController@index");
    
    // Route::get("/add", "AppController@addApp");
    // Route::post("/add", "AppController@create");

    // Route::prefix("{__idAPP}")->group( function() {

    //     Route::get("/show", "AppController@show");

    //     Route::get("/edit", "AppController@edit");
    //     Route::post("/edit", "AppController@update");

    //     Route::get("/toggle", "AppController@toggle");
    //     Route::get("/delete", "AppController@delete");
    // });    
#});