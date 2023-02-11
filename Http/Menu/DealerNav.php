<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class DealerNav extends Accessor {

	protected $tag 		= "dealers";

	protected $login;

	public function __construct( $login ) {
		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {

		if($login->isRol("dealers")) {

			$this->item(10, [
				"icon" 	=> "mdi-storefront-outline",
				"label" => __("words.home"),
				"url"	=> "dealers",
			]);

			$this->item(20, [
				"icon" 	=> "mdi-certificate",
				"label" => __("words.warranty"),
				"url"	=> "dealers/warranty",
			]);

			$this->item(100, [
				"icon" 	=> "mdi-cog",
				"label" => __("words.manager"),
				"url"	=> [
					[
						"icon" 		=> "mdi-storefront",
						"label" 	=> __("words.dealers"),
						"url"		=> "dealers",
					],
					[
						"icon" 		=> "mdi-account-circle",
						"label" 	=> __("words.users"),
						"url"		=> "dealers/users",
					]					
				]
			]);
		}
	}

	public function items( $index=4 ) {

		$skin = $this->skins["bs5"];
      	$skin = new $skin();

      	$skin->addFilterStyle("match", [
        	":node0" => "nav flex-column nav-light",
        	":node1" => "nav-item dropdown",
        	":node2" => "dropdown-menu show",
      	]);

      	$skin->addItems($this->get("stors"));
      	return $skin->nav(12);
	}
}