<?php 
namespace Delta\Http\Controllers\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Illuminate\Http\Request;
use Delta\Http\Support\Seller\UserSupport;
use Delta\Http\Request\Seller\UserRegisterRequest;
use Delta\Http\Request\Seller\UserRegisterFromSendmailRequest as SendMail;

class UserController extends Controller {	

	public function __construct( UserSupport $support ) {
		$this->boot($support);	

		app("urls")->addTag("urls", [
			"__entity" 	=> "seller/entity/__s3",
			'__user' 	=> "__entity/users"
		]);
	}

	public function index($dealer) {
		return $this->render(
			"entities.users.index", 
			$this->support->index($this->user(), $dealer)
		);
	}

	public function register($dealer) {
		return $this->render(
			"entities.users.register", 
			$this->support->register($this->user(), $dealer)
		);
	}

	public function userCreate( $dealer, UserRegisterRequest $request ) {
		return $this->support->userCreate($dealer, $request);
	}

	public function info( $entity, $user ) {
		return $this->render(
			"entities.users.info", 
			$this->support->info( $entity, $user )
		);
	}

	public function createFromSendMail( $entity ) {

		return $this->render(
			"entities.users.createfrommail", 
			$this->support->createFromSendMail($entity)
		);
	}

	public function registerFromSendmail( $entity, SendMail $request ) {
		return $this->support->registerFromSendmail( $entity, $request );
	}

	public function add( $entity ) {
		return $this->render( 
			"entities.users.add",
			$this->support->add( $entity )
		);
	}

	public function ajaxUsers( $ent, $src ) {
		return $this->render(
			"entities.users.search", 
			$this->support->ajaxUsers($ent, $src)
		);
	}

	public function syncUser( $ent, $ID ) {
		return $this->support->syncUser($ent, $ID);
	}

	public function detachUser( $ent, $ID ) {
		return $this->support->detachUser($ent, $ID);
	}

	public function rol( $ent, $usr ) {
		return $this->render(
			"entities.users.rol", 
			$this->support->rol($ent, $usr)
		);
	}

	public function rolUpdate( $ent, $user, Request $request ) {
		return $this->support->updateRol($ent, $user, $request);
	}
}

/* End of Controller UserController.php */