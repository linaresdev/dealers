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

		if( $login ) {

			$auth = Auth::guard("web")->user();

			$request->session()->regenerate();

            return redirect()->intended('/');
		}

		$validator = Validator::make($request->all(), [
			"email" => "required"
		]);

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