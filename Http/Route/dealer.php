<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


// /*
// * Rutas para la administracion de los dealers*/

// Route::get("/", "DealerController@index");

// Route::get("/register", "DealerController@register");
// Route::post("/register", "DealerController@create");

// Route::get("/update/{__orgID}", "DealerController@edit");
// Route::post("/update/{__orgID}", "DealerController@update");

// Route::get("/update/{__orgID}/logo", "DealerController@editLogo");
// Route::post("/update/{__orgID}/logo", "DealerController@updateLogo");


// // Route::prefix("seller")->group(function($route){
// //     Route::get("/", "SellerController@index");
// // });

// Route::prefix("{__orgID}")->group( function($route) {
//     Route::get("/", "EntityController@index");
// });


// /*
// * Organizaciones */
// Route::prefix("{__orgID}")->group(function($route){

//     /*
//     * Administracion de los usuarios y permisos */
//     Route::prefix("users")->group(function($route) {

//         Route::get("/", "UserController@index");    

//         ## Agregar usuarios
//         Route::get("/add", "UserController@add");
//         Route::get("/add/{src}", "UserController@ajaxUsers");

//         Route::get("/sync/{id}", "UserController@syncUser");
//         Route::get("/detach/{id}", "UserController@detachUser");

//         Route::post("/add", "UserController@userAdd");

//         ## Registro Local
//         Route::get("/register", "UserController@register");
//         Route::post("/register", "UserController@userCreate");

//         ## Registro via corre
//         Route::get("/send/register", "UserController@createFromSendMail");
//         Route::post("/send/register", "UserController@registerFromSendMail");
        
//         Route::get("/{__usrID}", "UserController@info");

//         ## Authorize
//         Route::get("/{__usrID}/rol", "UserController@rol");
//         Route::post("/{__usrID}/rol", "UserController@rolUpdate");

//     });

    /*
    * Garantias */
    // Route::prefix("warranty")->group( function(){

    //     Route::get("/", "WarrantyController@index");
    // });

// });