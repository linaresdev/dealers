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
    "__meta"    => __DEALER__."/System/Meta",
    "__cdn"     => "apps/cdn",
    "__uploads" => "apps/uploads"
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
* ADMIN MACRO URLS */
for ($i=1;$i<=5;  $i++) {  
    $segments["__s$i"] = __segment($i);
}
app("urls")->addTag("urls", $segments);

app("urls")->addTag("urls", [
    "__admin"           => config("admin.slug"),
    "__organization"    => "__admin/organizations",
    "__entity"          => "__organization/".__segment(3),
    "__users"           => "__admin/users",
    "__groups"          => "__users/groups",
]);


/*
* Alerts */
Alert::set("icon", "shield-account");
Alert::set("view", "alert::index");
Alert::set("animate", true);
Alert::set("fstub", '<p class="error"> :message </p>');

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

/*
* Share View */

$share["emo"] = (function($slug){
    if( session()->has("errors") ) {
        if( !empty( session()->get("errors")->first($slug) ) ) {
            return " is-invalid";
        }
    } 
});

$share["formback"] = (function($fieldNames){

    if( session()->has("errors") ) {
        return session()->get("errors")->first(
            $fieldNames, '<p class="error error-slow"> :message </p>'
        );
    }    
});

$this->app["view"]->share($share);

/*
* SESSION */
if(!function_exists("login") ) {
    function login( $guard="web" ) {
        return auth($guard)->user();
    }
}

/* End of helper App.php */