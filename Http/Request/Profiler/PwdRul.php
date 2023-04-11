<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;
## use Illuminate\Contracts\Validation\InvokableRule;

class PwdRul implements Rule {	

	protected $request;

	public function __construct($request ) {
		$this->request 	= $request;	
	}

	public function passes( $attribute, $value ) {

		$user = (new User)->find($this->request->get("id"));

		if( !Hash::check($this->request->get("oldpwd"), $user->password) ) {
			return false;
		}

		return true;
	}

	public function message() {
		return __("password.old.bad");
	}
}

/* End of Controller PwdRul.php */