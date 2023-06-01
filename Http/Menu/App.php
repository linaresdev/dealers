<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class App extends Accessor {

	protected $tag 		= "apps";

	protected $login;

	protected $items;

	public function __construct( $login ) {		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {

		$navSellers = $login->groups->where("type", "organization");

		foreach($navSellers as $key => $row ) {

			if( !in_array($row->slug, ["profiler", "warranty"]) ) {
				$this->items[$key]["icon"] 	= "mdi-".$row->icon;
				$this->items[$key]["label"] 	= __("words.".$row->slug);
				$this->items[$key]["url"] 		= __url($row->slug);
			}

			if( $row->slug == "warranty" ) {
				foreach($login->orgParents($row->id) as $k => $ent ) {
					$this->items[20 + $k]["icon"] 	= "mdi-".$ent->icon;
					$this->items[20 + $k]["label"] 	= $ent->group;
					$this->items[20 + $k]["url"] 	= __url("warranty/".$ent->id);
				}
			}					
		}

	}

	public function tab($multiplier=0, $input=" ") {
		return str_repeat($input, $multiplier);
	}

	public function nav($index=4) {	
		if( !empty($this->items) ) {

			$html = null;

			foreach( $this->items as $K => $V ) {
				$html .= $this->tab($index+4);
				$html .= '<a href="'.$V["url"].'" class="dropdown-item">'."\n";

				$html .= __icon($V["icon"]);
				$html .= $V["label"];

				$html .= $this->tab($index+4);
				$html .= "</a>\n";
			}

			return $html;
		}
	}

	public function items( $index=4 ) {

		return $this->nav($index);
	}
}

/* End of Controller Navbar.php */