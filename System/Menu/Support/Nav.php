<?php
namespace Delta\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Nav extends Accessor {

   public function __construct() {

   }

   public function items() {
      
      $skin = $this->skin["bs5"];
      $skin = new $skin();

      $skin->addFilterStyle("match", [
         ":node0" => "nav",
      ]);

      $skin->addItems($this->get("stors"));

      return $skin->nav(4);
   }
}
