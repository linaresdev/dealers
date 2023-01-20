<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* GRAMMARIES */

$this->loadGrammary($LANG, "esDO");

/*
* MACRO PATH */
app("urls")->addTag("paths", [
    "__meta"   => __DEALER__."/System/Meta",
]);


/*
* MACRO URLS */
app("urls")->addTag("urls", [
    "__admin"   => config("admin.slug"),
    "__now"     => request()->path(),
    "__uploads" => "apps/uploads",
    "__cdn"     => "apps/cdn",
    "__ajaxD"   => "dealer/ajax/zone"
]);


/*
* ROUTE BINDING */
if( __segment(1, "dealer")) {
    Route::bind("__dealer", function($dealer){
        return (new \Delta\Model\Group)->load($dealer);
    });

    Route::bind("__cid", function($ID){
        return (new \Delta\Model\Customer)->find($ID);
    });
}

/*
* BOOT IoC */
$this->app["menu"] = Menu::load();

/*
* AUTH && PROVIDER */
$this->app["config"]->set(
    "auth.providers.users.model", \Delta\Model\User::class
);

/*
* MIDDLEWARE */
$this->bootMiddleware(\Delta\Http\Middleware\Handler::class);

/*
* DRIVERS */
$this->loadThemeDriver("Lighter/Driver.php");

/*
* Area Menu */
Menu::createArea("nav-0", "Menu Lateral #0");
Menu::createArea("navbar-0", "Menu Superio #0");

/*
* Load Menu */
Menu::mount(\Delta\Http\Menu\Navbar::class);


/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'delta');


/*
* ADMIN */
if( __segment(1, "admin") ) {
    $this->app["config"]->set("lighter.layout", "layout-lg");
} 

/*
* Public && Assets */
$this->publishes([
    __DEALER__."/System/Assets" => base_path("public/apps/")
], "dealer");



/* End of helper App.php */