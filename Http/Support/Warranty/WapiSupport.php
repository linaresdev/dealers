<?php 
namespace Delta\Http\Support\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Customer;
use Illuminate\Support\Facades\Auth;

class WapiSupport {

	protected $warranty;

	public function __construct( Customer $warranty ) {
		$this->warranty = $warranty;
	}

	public function getWarranties() {

		$data = $this->warranty->where("state", "0");

		if( ($register = $data->count()) > 0 ) {

			$message = "[ $register ] Registros pendientes";

			if( $register == 1 ) {
				$message = "[ $register ] Registro pendiente";
			}

			return response()->json([
				"state" 	=> true,
				"message"	=> $message,
				"data" 		=> $data->get()->chunk(3)
			], 200);
		}
		return response()->json([
			"state" 	=> false,
			"message"	=> "Sin registro en transito",
		], 200);
	
	}

	public function attempt( $request ) {

		$rule["email"] 		= "required|string|email|max:100";
		$rule["password"] 	= "required|string";

		if( ($validator = validator($request->all(), $rule))->fails() ) {
			return response()->json([
				"status" 	=> false,
				"errors"	=> $validator->errors()->all()
			], 400);
		}

		if( !Auth::attempt($request->only("email", "password")) ) {
			return response()->json([
				"status" 	=> false,
				"errors"	=> ["Unauthorized"]
			], 401);
		}

		return $request;

		$user = User::where("email", $request->email)->first();

		return response()->json([
			"status" 	=> true,
			"message"	=> "User logged in successfully",
			"data"		=> $user,
			"token"		=> $user->createToken('API TOKEN')->plainTextToken
		], 200 );
	}

	public function closeWarranty( $niv, $state ) {
		return response()->json([
			"state" => true,
			"message" => "Successfull Warranty",
			"data" => [
				"niv" => $niv,
				"state" => $state
			]
		], 200);
	}

	public function logout() {

		if(auth()->check() ) {
			auth()->user()->tokens()->delete();

			return response()->json([
				"status" 	=> true,
				"message"	=> "User logged out successfully"
			], 200 );			
		}

		return response()->json([
			"status" 	=> false,
			"message"	=> "Already logged out"
		], 200 );
	}
}

/* End of providers WapiSupport.php */