<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class SellerNav extends Accessor {

	protected $tag 		= "seller";

	protected $login;

	public function __construct( $login ) {
		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {

		if($login->hasRol("seller")) {

			$this->item(10, [
				"icon" 	=> "mdi-cog",
				"label" => __("dealer.manager"),
				"url"	=> [
					[
						"icon" 		=> "mdi-storefront",
						"label" 	=> __("words.dealers"),
						"url"		=> "seller",
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