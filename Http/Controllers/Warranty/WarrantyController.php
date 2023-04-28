<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Warranty\WarrantySupport;
use Delta\Http\Request\Warranty\RegisterRequest;

class WarrantyController extends Controller {

	public function __construct( WarrantySupport $support ) {
		$this->boot($support);	

		app("urls")->addTag("urls", [
			"__warranty"	=> "warranty/__s2",
			"__zone"	=> "__warranty/srczone"
		]);
	}

	public function index() {
		if( ($main = ($user = $this->user())->org("warranty")) != null ) {	
			
			if( $user->orgHasParents($main->id) ) {
				$parent = $user->orgParents($main->id)->first();
				return redirect( "warranty/".$parent->id );
			}
			else{
				return redirect( '/' );
			}
		}
	}

	public function home($org) { 
		return $this->render("home", $this->support->home($org));
	}

	public function activate( $org, $warranty ) {
		return $this->support->activate($org, $warranty);
	}

	public function addWarranty( $org ) {
		return $this->render(
			"add-warranty", $this->support->addWarranty($org)
		);
	}

	public function saveWarranty( $org, RegisterRequest $request ) {
		return $this->support->saveWarranty($org, $request, $this->user());
	}

	public function srcZone( $org, $src ) {		
		return $this->render(
			"partial/zone", $this->support->srcZone($org, $src)
		);
	}

	public function show( $org, $warranty ) {
		return $this->render("show",$this->support->show($org, $warranty));
	}
}

/* End of Controller HomeController.php */