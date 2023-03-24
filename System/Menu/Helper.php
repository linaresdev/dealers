<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* MDI 
* Html Icon  */
if( !function_exists("__mdi") ) {
	function __mdi($slug) {
		return '<i class="mdi mdi-'.$slug.'"></i> ';
	}
}

/*
* ICON 
* Html Icon  */
if( !function_exists("__icon") ) {
	function __icon( $icon ) {
		if( empty($icon) ):
			return NULL;
		elseif($icon == "icon-toggle-nav"):
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
}

/*
* TAB 
* Identacion */
if( !function_exists("__tab") ) {
	function __tab($multiplier=0, $input=" ") {
		return str_repeat($input, $multiplier);
	}
}

/*
* ONLink 
* Current Link */
if( !function_exists("__on") ) {
	function __on($url) {
		if( __url($url) == __url(request()->path()) ) {
			return ' active';
		}
	}
}

/*
* NAV 
* Navigacion */
if(!function_exists("__nav") ) {
	function __nav( $data ) {
		if( !empty($data) && is_array($data) ) {
			$index 		= (isset($data["index"]))? $data["index"]: 4;
			$filters 	= (isset($data["filter"]))? $data["filter"]: [];

			$html  = null;

			if( !empty(( $items = $data["items"])) && is_array($items) ) {	

				$html .= __tab(4+$index);
				$html .= '<ul class="nav flex-column">'."\n";

				foreach( $items as $item ) {					
					
					if(!is_array($item["url"])) {
						
						$html .= __tab(8+$index);
						$html .= '<li class="nav-item">'."\n";

						$html .= __tab(12+$index);
						$html .= '<a href="'.__url($item['url']).'" class="nav-link'.__on($item['url']).'">'."\n";

						$html .= __tab(16+$index);
						$html .= __mdi($item["icon"]).__($item["label"])."\n";

						$html .= __tab(12+$index);
						$html .= "</a>\n";

						$html .= __tab(8+$index);
						$html .= "</li>\n";						
					}									
				}

				$html .= __tab(4+$index);
				$html .= "</ul>\n";									
			}
			
			return $html;
		}
	}
}

/*
* IS LOGIN NAV 
* Navigacion Auth */
if( !function_exists("isAuthNav") ) {
	function isAuthNav($org, $rol ) {
		if( auth("web")->check() ) {

			if( ($main = ($user = auth("web")->user())->org($org)) != null ) {
				
				if( $user->orgHasParents($main->id) ) {
					$nav["index"]             = 8;
		            $nav["filters"]["node0"]  = "nav flex-column";

					foreach($user->orgParents($main->id) as $row ) {
						$nav["items"][] = [
							"icon"   => $row->icon,
	                        "label"  => $row->group,
	                        "url"    => "warranty/".$row->id,
						];
					}
					
					return __nav($nav);
				}
			}
		}
	}
}