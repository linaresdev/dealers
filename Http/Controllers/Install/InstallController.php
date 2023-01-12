<?php 
namespace Delta\Http\Controllers\Install;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Request\Install\Password;
use Delta\Http\Controllers\Install\Support\Home;

class InstallController extends Controller {

	public function __construct( Home $support ) {	
		$this->boot($support);
	}

	public function index() {
		return $this->render("home", $this->support->portada());
	}

	public function confirmTerm() {
		return $this->support->confirmTerm();
	}

	public function env() {
		return $this->render("env", $this->support->env());
	}
	public function envUpdate( Request $request ) {
		return $this->support->envUpdate($request);
	}

	public function database() {
		return $this->render("database", $this->support->database());
	}

	public function forge($opt="create") {
		return $this->support->forge($opt);
	}

	public function close( Password $request ) {
		return $this->support->close($request);
	}

}

/* End of Controller HomeController.php */