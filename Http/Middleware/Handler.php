<?php
namespace Delta\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {

   public function init() {
      return [
         
      ];
   }

   public function route() {
      return [];
   }
   public function groups() {
      return [
         "app" => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Delta\Http\Middleware\AppMiddleware::class,
         ],
         "iweb" => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Delta\Http\Middleware\LoginMiddleware::class,
         ],
         "seller" => [
            \Delta\Http\Middleware\SellerMiddleware::class
         ],
         "warranty" => [
            \Delta\Http\Middleware\WarrantyMiddleware::class
         ]
      ];
   }
}