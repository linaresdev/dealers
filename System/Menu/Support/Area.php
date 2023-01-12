<?php
namespace Delta\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Area {

   protected $slug;

   protected $description;

   protected $stors = [];

   public function __construct( $slug=null, $description="Empty" ) {
      $this->slug          = $slug;
      $this->description   = $description;
   }

   public function __call($opt, $args) {

      if($opt == "add") {
         $this->stors[] = $args[0];
      }

      if( $opt == "get" ) {
         if( isset( $args[0] ) ) {
            return $this->{$args[0]};
         }
      }

      if( $opt == "info" ) {
         return $this->description;
      }

      return null;
   }
}
