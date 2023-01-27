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

	public function __construct( $login ) {
		
		$this->login = $login;

		$this->authorize( $login );
	}

	public function authorize( $login ) {
		foreach($login->groups->where("type", "organization") as $key => $row ) {
			$this->item($key, [
				"icon" 	=> "mdi-".$row->icon,
				"label" => $row->group,
				"url"	=> $row->slug
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
		$skin = $this->skins["bs5"];
      	$skin = new $skin();

      	$skin->addFilterStyle("match", [
        	":node0" => "nav flex-column",
      	]);

      	$skin->addItems($this->get("stors"));
      	return $skin->nav(12);
	}
}

/* End of Controller Navbar.php */