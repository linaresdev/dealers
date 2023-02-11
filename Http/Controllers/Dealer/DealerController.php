<?php namespace Delta\Http\Controllers\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Support\Dealer\DealerSupport;
use Delta\Http\Request\Dealer\UpdateRequest;
use Delta\Http\Request\Dealer\RegisterRequest;

class DealerController extends Controller {	

	public function __construct( DealerSupport $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->render("dealer", $this->support->index(
			$this->user()
		));
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

	public function updateLogo( $dealer, Request $request ) {
		return $this->support->updateLogo( $this->user(), $dealer, $request );
	}
}

/* End of Controller DealerController.php */