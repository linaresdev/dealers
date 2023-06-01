<?php 
namespace Delta\Http\Controllers\Admin\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Request\User\Register;
use Delta\Http\Support\Admin\UserSupport;
use Delta\Http\Request\Admin\Users\CredentialRequest;
use Delta\Http\Request\Admin\Users\PasswordRequest;

class UserController extends Controller {	

	public function __construct( UserSupport $app ) {	
		$this->boot($app);
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}

	public function config($key, $value) {
		return $this->support->setUserConfig( $this->user(), $key, $value);
	}

	/*
	* Crear Nuevo Usuarios */
	public function register() {
		return $this->render("register", $this->support->register());
	}
	
	public function create( Register $request ) {
		return $this->support->create( $this->user(), $request );
	}

	public function credential($user) {
		return $this->render("update.credential", $this->support->account($user));
	}
	public function credentialUpdate($user, CredentialRequest $request) {
		return $this->support->credentialUpdate($user, $request);
	}

	public function password($user) {
		return $this->render("update.password", $this->support->account($user));
	}
	public function passwordUpdate($user, PasswordRequest $request) {
		return $this->support->passwordUpdate($user, $request);
	}
}

/* End of Controller UserController.php */