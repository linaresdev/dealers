<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Support\Profiler;
use Delta\Http\Request\Profiler\ContactRequest;
use Delta\Http\Request\Profiler\AccountRequest;
use Delta\Http\Request\Profiler\PasswordRequest;
use Delta\Http\Request\Profiler\CredentialRequest;

class ProfilerController extends Controller {

	public function __construct( Profiler $support ) {
		$this->boot($support);

		$this->path = "delta::app.profilers.";	

		app("urls")->addTag("urls", [
			"__profile"	=> "profiler/__s2"
		]);
	}

	public function index($user) {
		return $this->render("index", $this->support->index($user));
	}

	public function updateAccount($user) {
		return $this->render(
			"update.account", $this->support->updateAccount($user)
		);
	}

	public function saveAccount( $user, AccountRequest $request ) {
		return $this->support->saveAccount($user, $request);
	}

	public function updateCredential( $user, CredentialRequest $request ) {
		return $this->support->updateCredential($user, $request);
	}

	public function updateContact( $user, ContactRequest $request ) {
		return $this->support->updateContact($user, $request);
	}
	public function updateAddress( $user, Request $request ) {

		$ruls["address"] 		= "required";
		$messages["required"] 	= __("form.error.required");
		$attributes["address"]	= __("words.address");

		$request->validate($ruls, $messages, $attributes);

		return $this->support->updateAddress($user, $request);
	}

	public function updatePassword($user) {
		return $this->render(
			"update.password", $this->support->updateAccount($user)
		);
	}

	public function savePassword( $user, PasswordRequest $request ) {
		return $this->support->savePassword($user, $request);
	}

	public function userConfig($user) {
		return $this->render(
			"configs.index", $this->support->config($user)
		);
	}
}

/* End of Controller AccountController.php */