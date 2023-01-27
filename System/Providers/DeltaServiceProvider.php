<?php namespace Delta\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Facade\Org;
use Delta\Menu\Facade\Menu;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class DeltaServiceProvider extends ServiceProvider {
	
	public function boot( Kernel $HTTP, Translator $LANG ) {

		$this->HTTP = $HTTP;
		$this->LANG = $LANG;
		
		require_once(__DEALER__."/Http/App.php");
	}

	public function register() {

		$this->app->bind("Org", function($app){
			return new \Delta\Support\Org($app);
		});

		$this->app["org"] = Org::load();

		require_once(__DIR__."/../Common.php");
	}

	public function loadGrammary( $LANG, $LOCALE ) {
		if( class_exists( ($store = "\Delta\Locale\\$LOCALE") ) ) {

			$store 			= new $store;
			
			$header = $store->header();
			$lines 	= $store->lines();
			$locale = $header["slug"];

			$this->app->setLocale($locale);

			$LANG->addLines( $lines, $locale );
		}
	}

	/*
	* DRIVERS
	* Load Drivers */
	public function loadDrivers( $drivers ) {
		foreach( $drivers as $driver ) {

			if( class_exists($driver) ) {
				$driver = new $driver;

				/* Providers */
				if( method_exists($driver, "providers") ) {
					foreach( $driver->providers() as $provider ) {
						$this->app->register($provider);
					}
				}

				/* Alias */
				if( method_exists($driver, "alias") ) {
					foreach( $driver->alias() as $alia => $facade ) {
						AliasLoader::getInstance()->alias($alia, $facade);
					}
				}
			}
		}
	}

	/*
	* ALIASES
	* Load Alias */
	// public function loadAlias( $alias=NULL ) {
	// 	if(!empty($alias) && is_array($alias)) {
	// 		foreach ($alias as $alia => $class) {
	// 			AliasLoader::getInstance()->alias($alia, $class);
	// 		}
	// 	}
	// }

	public function loadThemeDriver($theme) {
		require_once(__THEME__.$theme);
	}

	public function bootMiddleware($handler) {

		if(!is_object($handler)) {
			$handler = new $handler;
		}

		## INIT
		if( !empty( ( $initialzer = $handler->init()) ) ) {
			foreach ($initialzer as $middleware ) {
				$this->HTTP->pushMiddleware($middleware);
			}
		}

		## GROUPS
		if( !empty( ( $groups = $handler->groups()) ) ) {
			foreach ( $groups as $group => $middlewares ) {
				$this->app["router"]->middlewareGroup(
					$group, $middlewares
				);
			}
		}
	}
}


/* End of providers DeltaServiceProvider.php */