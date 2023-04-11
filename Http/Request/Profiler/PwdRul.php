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
use Illuminate\Contracts\Validation\InvokableRule;

class PwdRul implements InvokableRule {	

	protected $request;

	public function __construct($request ) {
		$this->request 	= $request;	
	}

	public function __invoke($attribute, $value, $fail ) {

		$user = (new User)->find($this->request->get("id"));

		if( !Hash::check($this->request->get("oldpwd"), $user->password) ) {
			$fail(__("password.old.bad"));
		}
	}
}

/* End of Controller PwdRul.php */