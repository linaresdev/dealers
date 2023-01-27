<?php

define("__DEALER__", realpath(__DIR__."/../"));
define("__THEME__", __DEALER__."/System/Themes/");

$this->mergeConfigFrom(__DIR__."/app.php", "admin");


/*
* DRIVERS */
$this->loadDrivers([
   \Delta\Driver::class,
   \Delta\Menu\Driver::class,
]);


## URLS
$this->app["urls"] = new \Delta\Support\Urls($this->app);



## PATH
if( !function_exists("__path") ) {
   function __path($key=null) {
      return app("urls")->path($key);
   }
}

## URLS
if( !function_exists("__url") ) {
   function __url($uri=null, $parameters=[], $secure=null ) {
      return app("urls")->url($uri, $parameters, $secure);
   }
}

if( !function_exists("__back") ) {
   function __back($to=null) {
      if($to != null ) {
         return redirect()->to(__url($to));
      }
      return back();
   }
}

## SEGMENT
if( !function_exists("__segment") ) {
   function __segment( $index=null, $match=null ) {
      if(is_null($index) ) return request()->segments();

      if( is_numeric($index) ) {

         $segment = request()->segment($index);

         if( !is_null($match) ) {
            return ($segment == $match);
         }

         return $segment;
      }
   }
}
