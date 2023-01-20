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