<?php 
namespace Delta\Http\Controllers\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Support\Dealer\UserSupport;
use Delta\Http\Request\Dealer\UserRegisterRequest;
use Delta\Http\Request\Dealer\UserRegisterFromSendmailRequest as SendMail;

class UserController extends Controller {	

	public function __construct( UserSupport $support ) {
		$this->boot($support);	

		app("urls")->addTag("urls", [
			'__user' => "dealers/__s2/users"
		]);
	}

	public function index($dealer) {
		return $this->render(
			"users.index", $this->support->index($this->user(), $dealer)
		);
	}

	public function register($dealer) {
		return $this->render(
			"users.register", $this->support->register($this->user(), $dealer)
		);
	}

	public function userCreate( $dealer, UserRegisterRequest $request ) {
		return $this->support->userCreate($dealer, $request);
	}

	public function info( $entity, $user ) {
		return $this->render("users.info", $this->support->info( $entity, $user ));
	}

	public function createFromSendMail( $entity ) {

		//return view("delta::app.dealers.users.mail.getmembership");

		return $this->render(
			"users.createfrommail", $this->support->createFromSendMail($entity)
		);
	}

	public function registerFromSendmail( $entity, SendMail $request ) {
		return $this->support->registerFromSendmail( $entity, $request );
	}
}

/* End of Controller UserController.php */