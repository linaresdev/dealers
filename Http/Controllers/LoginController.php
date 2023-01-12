<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Support\Login;
use Delta\Http\Request\Ruls\LoginRul;
use Delta\Http\Request\Login as LoginRequest;

class LoginController extends Controller {

	public function __construct( Login $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->render("login", $this->support->login());
	}

	public function attempt(LoginRequest $request) {
		
		return $this->support->attempt($request);
	}

	public function logout() {		
		return $this->support->logout("web");
	}
}

/* End of Controller LoginController.php */