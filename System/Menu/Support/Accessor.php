<?php
namespace Delta\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Accessor {

   protected $tag;

   protected $area = "name";

   protected $filters   = [];

   protected $stors     = [];

   protected $skins = [
      "UL"  => \Delta\Menu\Skin\UL::class,
      "bs5" => \Delta\Menu\Skin\BS5::class
   ];

   public function loadArea($key) {
      if(!empty($key) ) {
         $this->areas = $key;
      }
   }

   public function skin($stub=null, $data=[]) {

      if( array_key_exists($stub, $this->skins) ) {
         $skin = $this->skins[$stub];
         return new $skin($data);
      }
   }

   public function __call( $opt, $args ) {

      if( $opt == "tag" ) {
         $this->tag = $args[0];
      }

      if( $opt == "area" ) {
         $this->area = $args[0];
      }

      if( $opt == "add" ) {
         if( isset($this->{$args[0]}) ) {
            $this->{$args[0]}[] = $args[1];
         }
      }

      if( $opt == "get" ) {
         if( isset($this->{$args[0]}) ) {
            return $this->{$args[0]};
         }
      }

      if( $opt == "filter" ) {

         if( !empty($args[0]) && is_array($args[1]) ) {
            foreach ( $args[1] as $key => $value) {
               $this->filters[$args[0]][$key] = $value;
            }
            //$this->filters = array_merge($this->filters, $args[0]);
         }
      }

      if( $opt == "item" ) {
         if( empty($args[0]) ) {
            $this->stors[] = $args[1];
         }
         else {
            $this->stors[$args[0]] = $args[1];

            sort($this->stors);
         }
      }
   }

}
