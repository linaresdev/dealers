<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class WarrantyNav extends Accessor {

	protected $tag 		= "warranty";

	protected $login;

	public function __construct( $login ) {
		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {
		
		if($login->hasOrg("warranty")) {

			$nav["icon"] 	= "mdi-shield-car";
			$nav["label"] 	= __("warranty.manager");

			$home[0]["icon"] 	= "";
			$home[0]["label"] 	= __("words.home");
			$home[0]["url"] 	= "warranty";		

			$items = null;

			foreach( $login->org("warranty")->parent() as $key => $dealer ) {
				$items[$key]["icon"] 	= "";
				$items[$key]["label"] 	= $dealer->group;
				$items[$key]["url"] 	= "warranty/".$dealer->id;
			}

			$nav["url"] = array_merge($home, $items);

			$this->item(10, $nav);
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

      	// $skin->addFilterUrls("match", function($data){
      	// 	dd($data);
      	// });

      	$skin->addItems($this->get("stors"));
      	return $skin->nav(12);
	}
}