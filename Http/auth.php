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

## TAG URL FROM AUTH
if( $user->isRol("dealers") ) {

	if( !empty( $dealer = $user->dealer() ) ) {                   
        app("urls")->addTag( "urls", [
            "__dealer" => $dealer->slug
        ]);
    }
}

/*
* REDIRECTIONS */

## Redirect user if url serment 1 = dealer && empty dealer
if(empty($dealer) && __segment(1, "dealer") ) {
	return redirect("/");
}


/*
* 	SHARE VIEW */
view()->share([
	"UI" => $user
]);