<?php
namespace Delta\Alert;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
      return [
        "name"			 => "Alert",
        "author"		 => "Ing. Ramón A Linares Febles",
        "email"			 => "rlinareslf@gmail.com",
        "license"		 => "MIT",
        "support"		 => "http://www.iipec.net",
        "version"		 => "V-1.0",
        "description"    => "Alert V-1.0",
      ];
   }

   public function app() {
      return [
      	"type"			=> "library",
      	"slug"			=> "alert",
      	"driver"		=> \Delta\Alert\Driver::class,
      	"token"			=> NULL,
      	"activated" 	=> 1,
      ];
   }

	public function providers() {		
		return [
			\Delta\Alert\AlertServiceProvider::class
		];
	}

	public function alias() {
		return [
			"Alert" => \Delta\Alert\Facade\Alert::class,
		];
	}

	public function install( $app ) {
	}

	public function uninstall( $app ) {
	}
}
