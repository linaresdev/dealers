<?php

namespace Delta\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
      return [
        "name"			   => "Menu",
        "author"		   => "Ing. Ramón A Linares Febles",
        "email"		   => "rlinareslf@gmail.com",
        "license"		   => "MIT",
        "support"		   => "http://www.iipec.net",
        "version"		   => "V-1.0",
        "description"   => "Menu V-1.0",
      ];
   }

   public function app() {
      return [
      	"type"			=> "library",
      	"slug"			=> "menu",
      	"driver"		   => \Delta\Menu\Driver::class,
      	"token"			=> NULL,
      	"activated" 	=> 1,
      ];
   }

   public function providers() {
     return [
        \Delta\Menu\Provider\MenuServiceProvider::class,
     ];
   }

   public function alias() {
      return [
         "Menu" => \Delta\Menu\Facade\Menu::class
      ];
   }

   public function install( $app ) {
     $app->create($this->app())->addInfo($this->info());
   }

   public function uninstall( $app ) {
   }
}
