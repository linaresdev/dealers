<?php
namespace Delta\Menu\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Factory {

   protected $app;

   protected $taggs = [];

   protected $areas = [];

   public function __construct( $app=null ) {
      $this->app = $app;
   }

   public function load( $term=null ) {

      if(empty( $term )) return $this;

      if( is_string($term) ) {
         if( array_key_exists( $term, $this->taggs ) ) {
            return $this->taggs[$term];
         }
      }
   }

   /*
   * Crear area de menu */
   public function createArea($slug=null, $description="Empty Name Menu") {
      if(!empty($slug) && is_string($slug) ) {
         if( !array_key_exists($slug, $this->areas) ) {
            $this->areas[$slug] = new \Delta\Menu\Support\Area(
               $slug, $description
            );
         }
      }
   }

   /*
   * Save From Array */
   public function saveFromArray($data) {
      if( array_key_exists("tag", $data) ) {
         
         $nav  = new \Delta\Menu\Support\Nav();
         $nav->tag($data["tag"]);


         if( array_key_exists("area", $data) ) {
            $nav->area($data["area"]);
         }

         if( array_key_exists("filters", $data) ){
            foreach ($data["filters"] as $key => $value) {
               $nav->filters($key, $value);
            }
         }

         if( array_key_exists("items", $data) ) {
         }

         $this->taggs[$data["tag"]] = $nav;
      }

   }

   /*
   * Save From Object And Object String */
   public function saveFromObject( $nav ) {
      if( is_string($nav) ) {
         if( class_exists($nav) ) {
            $nav = new $nav;
         }
      }
      
      if( is_object($nav) ) {
         if( !array_key_exists( ($tag = $nav->get("tag")), $this->taggs) ) {

            $nav->boot();

            $this->taggs[$tag] = $nav;

            if( array_key_exists( ($area = $nav->get("area")), $this->areas ) ) {
               $this->areas[$area]->add($nav);
            }
         }
      }
   }

   /*
   * Save From Closurre */
   public function saveFromClosure( $slug, $nav ) {
      if( !array_key_exists( $slug, $this->taggs ) ) {

         if( !empty(($area = $nav->get("area"))) ) {
            if( array_key_exists($area, $this->areas) ) {
               $this->areas[$area]->add($nav);
            }
         }

         $this->taggs[$slug] = $nav;
      }
   }

   /*
   * Mount menu */
   public function mount( $tag=null, $closure=null ) {
      if( !empty($tag) ) {
         if( is_array($tag) ) {
            $this->saveFromArray($tag);
         }
         elseif ( is_object($tag) OR (is_string($tag) && is_null($closure)) ) {
            $this->saveFromObject($tag);
         }
         elseif( is_string($tag) && $closure instanceof  \Closure ){
            $this->saveFromClosure(
               $tag, $closure(new \Delta\Menu\Support\Nav)
            );
         }
      }
   }

   /*
   * Dinamic Menu  */
   public function listen( $area=null ) {

      if( !empty($area) ) {
         if( array_key_exists($area, $this->areas) ) {
            if( !empty( ($stors = $this->areas[$area]->get("stors") ) ) ) {
               $str = null;

               foreach( $stors as $nav ) {
                  if( method_exists($nav, "items") ) {
                     if( !empty($nav->items()) ) {
                        $str .= $nav->items();
                     }
                  }
               }

               return $str;
            }
         }
      }
   }

   /*
   * Tag Menu  */

   public function tag($slug=null, $index=4) {
      if( !empty($slug) ) {
         if( array_key_exists( $slug, $this->taggs) ) {
            if( method_exists(($nav = $this->taggs[$slug]), "items") ) {
               return $nav->items($index);
            }
         }
      }
   }

}
