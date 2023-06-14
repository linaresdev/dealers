<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

## AUTH STABLE
if( $user->activated != 1 )  {
    $auth->logout();
    $validator = Validator::make(["field" => null], ["field" => "required"]);
    $validator->errors()->add('login', __("auth.".$user->activated));

    return redirect('/login')->withErrors($validator);
}

## AUTH USER CONFIGS
$user->loadConfig();

## LOAD MENU AUTH
foreach( (new \Delta\Http\Menu\Handler())->menu() as $menu ) {
    if( !empty($menu) ) {
        Menu::mount( new $menu( $user ) );
    }
}

## ORGANIZATION ACCES

if( __segment(1, env("APP_ADMIN_SLUG")) ) {
    if( $user->org("admin") == null ) abort(404);
}

if( !Menu::load("apps")->has("items") && __segment(1, "seller") ) {
    return redirect("/");
}

if( !Menu::load("apps")->has("items") && __segment(1, "warranty") ) {
    return redirect("/");
}

/*
* 	SHARE VIEW */
view()->share([
	"UI" => $user
]);
