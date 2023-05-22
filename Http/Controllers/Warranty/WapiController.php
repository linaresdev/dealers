<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WapiController extends Controller
{	
	public function __construct( Customer $warranty ) {	
		$this->warranty = $warranty;
	}

	public function login(Request $request ) {

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

		$user = User::where("email", $request->email)->first();

		return response()->json([
			"status" 	=> true,
			"message"	=> "User logged in successfully",
			"data"		=> $user,
			"token"		=> $user->createToken('API TOKEN')->plainTextToken
		], 200 );
		
	}

	public function index() {
		return $this->warranty->all();
	}

	public function show( Customer $warranty ) {
		return $warranty;
	}

	public function store( Request $request ) {
		dd($request->all());
	}

	public function logout() {
		auth()->user()->tokens()->delete();

		return response()->json([
			"status" 	=> true,
			"message"	=> "User logged out successfully"
		], 200 );
	}
}

/* End of Controller WarrantyApiController.php */