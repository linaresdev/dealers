<?php
namespace Delta\Menu\Skin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
FORMAT
   $this->icon("glyphicon|mdi-account|img.png|img.jpg|img.gif|svg");
   $this->tab($index);
   $this->filters($filters);
ADD
   $this->addItems($items);
*/

class Accessor {

   protected $filters = [
      "style" => [],
      "label" => [],
      "isOn"  => []
   ];

   protected $items = [];

   /*
	* HELPER DE ICONOS E IMAGENES */
	public function icon($icon=NULL) {
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

   /*
	* TABULADOR */
	public function tab($multiplier=0, $input=" ") {
		return str_repeat($input, $multiplier);
	}

   /*
   * FILTERS */
   public function addFilters($filters) {
      foreach ( $filters as $key => $filter ) {
         if( array_key_exists($key, $this->filters) ) {
            $this->filters[$key] = $filter;
         }
      }
   }

   public function __filter( $key=null, $value=null, $filters=null ) {

      foreach ( $this->filters[$key] as $search => $args ) {
         // MATCH -> reemplazar
         if( $search == "match" && is_array( $args ) ) {
            foreach ( $args as $alia => $arg ) {
               $value = str_replace($alia, $arg, $value);
            }
         }

         // DRESS -> Vestir o revertir
         if( $search == "dress" && is_array( $args ) ) {
            foreach ( $args as $alia => $arg ) {
               $value = str_replace($alia, $arg, $value);
            }
         }
      }

      return $value;
   }

   /*
   * ADD */
   public function addItems( $items ) {
      $this->items = $items;
   }

}
