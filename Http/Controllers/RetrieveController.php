<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\UserSession;
use Illuminate\Http\Request;
use Delta\Http\Support\Retrieve;
use Delta\Http\Request\RetrievePasswordRequest;

class RetrieveController extends Controller {

	protected $sess;

	public function __construct( Retrieve $support, UserSession $sess ) {	
		$this->boot($support);

		$this->sess = $sess;
	}

	public function password($token) {
		return $this->render(
			"retrieve.password", $this->support->password($token)
		);
		
	}

	public function passwordUpdate( RetrievePasswordRequest $request ) {
		return $this->support->passwordUpdate($request);
	}

	public function passwordUnknown( $token ) {
		return $this->render(
			"retrieve.unknown", $this->support->reportRetriveUnknown($token )
		);
	}
}

/* End of Controller LoginController.php */