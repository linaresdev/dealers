<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* CONFIG */
$configs["skin.slug"]       = "lighter";
$configs["admin.domain"]    = env("APP_ADMIN_SLUG", "admin");

foreach($configs as $key => $value) {
    $this->app["config"]->set($key, $value);
}



/*
* MACRO URLS */
app("urls")->addTag("urls", [
	"__lighter" => "lighter/assets",
    ":avatar_path" => "__lighter/images"
]);

/*
* MACRO PATH */
app("urls")->addTag("paths", [ 
]);


/*
* MIDLEWARE */ 
$this->HTTP->pushMiddleware(
    \Delta\Themes\Lighter\Director::class
);

/*
* VIEWS */
$this->loadViewsFrom(__DIR__.'/Views', 'lighter');

/*
* SKIN */
$this->app["skin"] = new \Delta\Support\Skin("lighter");

$this->app["view"]->share([
    "skin" => $this->app["skin"]
]);

/*
* Public && Assets */
$publishes = [
    __DIR__."/Public/Assets" => base_path("public/lighter/assets")
];

$this->publishes($publishes, "lighter");


/* End of helper Driver.php */