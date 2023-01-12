<?php 
namespace Delta\Http\Menu;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Menu\Support\Accessor;

class AdminNav extends Accessor {

	protected $tag 		= "adminnav";

	protected $login;

	public function __construct( $login ) {
		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {
		
		if( $login->isRol("dealers") ) {

			$this->item(10,[
				"icon"	=> "mdi-storefront-outline",
				"label" => "words.dealer",
				"url"	=> "/dealer/__dealer"
			]);
		}		

		if( $login->isRol("admin") ) {
			$this->item(50,[
				"icon"	=> "mdi-cog",
				"label" => "admin.slug",
				"url"	=> "__admin/"
			]);
		}
	}

	public function tab($multiplier=0, $input=" ") {
		return str_repeat($input, $multiplier);
	}

	public function icon($icon=NULL) {

		if( empty($icon) ):
			return NULL;
		elseif($icon == "toggle"):
			return '<i class="mdi mdi-segment"></i> ';
		elseif( preg_match('/^mdi/', $icon) ) :
			return '<i class="mdi '.$icon.'"></i> ';
		elseif( preg_match('/^glyphicon/', $icon) ):
			return '<span class="'.$icon.'"></span> ';
		elseif ( preg_match('/[jpg|png|svg|gif]/i', $icon) ):
			return '<img src="'.__url($icon).'" class="navicon" alt="Image"> ';
		endif;

		return NULL;
	}

	public function link($item, $index=8) {

		$tag=$this->tb($index);

		$tag .= '<a href="';
		$tag .= __url($item["url"]);
		$tag .= '" class="nav-lens">';
		$tag .= "\n";

		$tag .= $this->tab($index+4);
		$tag .= $this->icon($item["icon"]);
		$tag .= "<br />";
		$tag .= __($item["label"]);
		$tag .= "\n";

		$tag .= $this->tab($index);
		$tag .= "</a>";

		return $tag;
	}

	public function items( $index=4 ) {
		if( !empty($this->stors) ) {

			$item = null;

			foreach($this->stors as $stor ) {
				$item .= $this->link($stor, 24);
			}

			return $item;
		}
	}
}

/* End of Controller Navbar.php */