<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\UserSession;
use Delta\Alert\Facade\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class Login {

	public function login() {

		$data["title"] = "Acceder a mi cuenta";

		return $data;
	}

	public function attempt( $request ) {

		$validator = Validator::make($request->all(), [
			"email" => "required"
		]);

		## Atentico
		$login = Auth::attempt([
			"email" => $request->email,
			"password" => $request->pwd
		]);	

		## Evaluo Login
		if( $login ) {

			$user = ($auth = Auth::guard("web"))->user();			
			
			if( ($expwd = $user->passwordExpire()) != null ) {
				if( $expwd->created_at->isPast() ) {
					Alert::prefix("system")->warning(__("password.updated.required"));
				}
			}

			## Validamos su estatu
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

			## Si existen sessiones aviertas la cerramos
			$user->closeLastSession("login", $user->sessID());

			## Actualizar Session ID
			$request->session()->regenerate();

			## Notificar Acceso
			(new UserSession)->news("login", [
				"subject" 	=> "Acceso a la cuenta $user->fullname",
				"path" 		=> __CLASS__,
				"device"	=> $user->currentDevice(),
				"platform"	=> $user->currentPlatform(),
				"browser"	=> $user->currentBrowser(),
				"robot"		=> $user->currentRobot()
			]);	



			## Redirigir al usuario
            return redirect()->intended('/');
		}

		$validator->errors()->add(
            'login', __("verify.credentials")
        );

		return back()->withErrors($validator)->withInput();
	}

	public function logout($guard) {
		return Auth::guard($guard)->user()->logout();
	}
}

/* End of providers Login.php */