<?php 
namespace Delta\Http\Controllers\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Delta\Http\Support\Seller\EntitySupport;

class EntityController extends Controller {

	public function __construct( EntitySupport $support ) {	
		
		$this->boot($support);

		app("urls")->addTag("urls", [
			"__entity" => "seller/entity/__s3",
			"__user" => "__entity/users"
 		]);
	}

	public function index($ent) {
		return $this->render("entities.index", $this->support->index($ent));
	}
}

/* End of Controller EntityController.php */