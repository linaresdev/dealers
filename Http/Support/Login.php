<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class Login {

	public function login() {

		$data["title"] = "Acceder a mi cuenta";

		return $data;
	}

	public function attempt( $request ) {

		$login = Auth::attempt([
			"email" => $request->email,
			"password" => $request->pwd
		]);

		$validator = Validator::make($request->all(), [
			"email" => "required"
		]);

		if( $login ) {

			$user = ($auth = Auth::guard("web"))->user();

			if( $user->activated != 1 ) {

				if( $user->activated == 0 ) {
					$validator->errors()->add('login', __("auth.".$user->activated));
				}
				if( $user->activated == 2 ) {
					$validator->errors()->add('login', __("auth.".$user->activated));
				}
				if( $user->activated == 3 ) {
					$validator->errors()->add('login', __("auth.".$user->activated));
				}
				
				$auth->logout();

				return back()->withErrors($validator)->withInput();
			}			

			$request->session()->regenerate();

            return redirect()->intended('/');
		}		

		$validator->errors()->add(
            'login', 'Berifique las credenciales suministradas'
        );

		return back()->withErrors($validator)->withInput();
	}

	public function logout($guard) {
		Auth::guard($guard)->logout();

		return redirect('/');
	}
}

/* End of providers Login.php */