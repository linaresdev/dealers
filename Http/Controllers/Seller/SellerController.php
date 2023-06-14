<?php 
namespace Delta\Http\Controllers\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Request\Seller\LogoRequest;
use Delta\Http\Support\Seller\SellerSupport;
use Delta\Http\Request\Seller\UpdateRequest;
use Delta\Http\Request\Seller\RegisterRequest;

class SellerController extends Controller {	

	public function __construct( SellerSupport $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->render("index", $this->support->index(
			$this->user()
		));
	}

	public function search( $src ) {
		return $this->render( "search", $this->support->search( $src ) );
	}

	public function register() {
		return $this->render("register", $this->support->register());
	}

	public function create( RegisterRequest $request ) {
		return $this->support->create( $request );
	}

	public function edit($dealer) {
		return $this->render("update.dealer", $this->support->edit($this->user(), $dealer));
	}

	public function update( $dealer, UpdateRequest $request ) {
		return $this->support->update( $this->user(), $dealer, $request );
	}

	public function editLogo($dealer) {
		return $this->render("update.logo", $this->support->editLogo($this->user(), $dealer));
	}

	public function updateLogo( $dealer, LogoRequest $request ) {
		return $this->support->updateLogo( $this->user(), $dealer, $request );
	}

	public function delete( $org ) {
		return $this->support->delete($org);
	}
}

/* End of Controller DealerController.php */