<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;

class UserSupport {

	protected $user;

	public function __construct( User $user) {
		$this->user = $user;
	}

	public function getUser($perpage=10) {
		$data = $this->user->where("activated", "<", 4);
		$data->orderBY("id", "DESC");


		return $data->paginate($perpage);
	}

	public function setUserConfig( $user, $key, $value ) {

		$user->saveMeta("config", $key, $value);

		return back();
	}

	public function share() {

		return [
			"layout" => "layout-md",
			"hasError" => function($name) {
				if( session()->has("errors") ) {
					$errors = session()->get("errors");

					return $errors->first(
						$name, 
						'<p class="error"> :message </p>'
					);
				}
			}
		];
	}

	public function index() {
		$data["title"] 		= __("words.users");
		$data["optfilters"] = __("filter.user");
		$data["users"]		= $this->getUser();

		return $data;
	}

	public function register( ) {
		$data["title"] 		= __("user.register");
		return $data;
	}

	public function create($UI, $request ) {

		$fullname = ($firtname 	= $request->firstname)." ".($lastname = $request->lastname);
		$email = $request->email;

		$this->user->fullname 	= $fullname;
		$this->user->publicname = $firtname;
		$this->user->rnc 		= $request->rnc;
		$this->user->user 		= (explode('@', $email))[0];
		$this->user->email 		= $email;
		$this->user->cellphone  = $request->cellphone;
		$this->user->password 	= $request->rnc;

		if( $this->user->save() ) {
			return redirect('__admin/users');
		}

		return back()->withInput();

	}
}

/* End of Controller UserSopport.php */