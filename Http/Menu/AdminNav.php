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

	public function header($label, $index=4) {
		$html = __tab($index);
		$html .= '<div class="nav-header">'."\n";

			$html .= __tab($index+8);
			$html .= '<div class="row">'."\n";

				$html .= __tab($index+12);
				$html .= '<div class="col-auto">'."\n";

				$html .= __tab($index+16);
				$html .= '<span class="subtitle">'.$label."</span>\n";

				$html .= __tab($index+12);
				$html .= "</div>\n";

				$html .= __tab($index+12);
				$html .= '<div class="col">';
				$html .= '<hr class="divider" />';
				$html .= "</div>\n";

			$html .= __tab($index+8);
			$html .= "</div>\n";

		$html .= __tab($index+4);
		$html .= "</div>\n";

		return $html;
	}

	public function authorize( $login ) {

		$this->item(10,[
			"icon"	=> "mdi-home",
			"label" => __("words.home"),
			"url"	=> "/__admin"
		]);

		if( $login->isRol("admin") ) {

			$this->item(20,[
				"icon"	=> "mdi-account-circle",
				"label" => __("words.users"),
				"url"	=> "/__admin/users"
			]);

		}
	}

	public function items( $index=4 ) {

		$skin = $this->skins["bs5"];
      	$skin = new $skin();

      	$skin->addFilterStyle("match", [
        	":node0" => "nav flex-column nav-light",
      	]);

      	$skin->addItems($this->get("stors"));
      	return $skin->nav(12);
	}
}

/* End of Controller Navbar.php */