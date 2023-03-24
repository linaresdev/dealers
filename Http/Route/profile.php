<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::prefix("{__usrID}")->group( function($route) {

    Route::get("/", "ProfilerController@index");

    Route::prefix("update")->group( function($route){

        Route::get("/account", "ProfilerController@updateAccount");

        Route::post("/account/credentials", "ProfilerController@updateCredential");
        Route::post("/account/account", "ProfilerController@saveAccount");
        Route::post("/account/contact", "ProfilerController@updateContact");
        Route::post("/account/address", "ProfilerController@updateAddress");

        Route::get("/password", "ProfilerController@updatePassword"); 
        Route::post("/password", "ProfilerController@savePassword");        
    });

    Route::get("/config", "ProfilerController@userConfig");
});