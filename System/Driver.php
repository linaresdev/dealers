<?php
namespace Delta;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
      return [
        "name"			 => "Dealer",
        "author"		 => "Ing. Ramón A Linares Febles",
        "email"			 => "rlinareslf@gmail.com",
        "license"		 => "MIT",
        "support"		 => "http://www.iipec.net",
        "version"		 => "V-1.0",
        "description"    => "Dealer V-1.0",
      ];
   }

   public function app() {
      return [
      	"type"			=> "package",
      	"slug"			=> "dealer",
      	"driver"		=> \Delta\Driver::class,
      	"token"			=> NULL,
      	"activated" 	=> 1,
      ];
   }

   public function providers() {
     return [
     ];
   }

   public function alias() {
      return [
      	"Org" => \Delta\Facade\Org::class,
      ];
   }

   public function install( $app ) {
   }

   public function uninstall( $app ) {
   }
}
