<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

## AUTH USER CONFIGS
$user->loadConfig();

## LOAD MENU AUTH
foreach( (new \Delta\Http\Menu\Handler())->menu() as $menu ) {
    if( !empty($menu) ) {
        Menu::mount( new $menu( $user ) );
    }
}



## ORGANIZATION ACCES


/*
* 	SHARE VIEW */
view()->share([
	"UI" => $user
]);