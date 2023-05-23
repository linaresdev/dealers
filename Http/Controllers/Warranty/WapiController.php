<?php 
namespace Delta\Http\Controllers\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Customer;
use Illuminate\Http\Request;
use Delta\Http\Support\Warranty\WapiSupport;

class WapiController extends Controller
{	

	protected $wapi;

	public function __construct( WapiSupport $wapi ) {	
		$this->wapi = $wapi;
	}

	public function login(Request $request ) {
		return $this->wapi->attempt($request);		
	}

	public function warranties() {
		return $this->wapi->getWarranties();
		// return response()->json([
		// 	"status" 	=> true,
		// 	"message"	=> "Garantías disponibles",
		// 	"data" 		=> $this->support->all()
		// ], 200);
	}

	public function show( Customer $warranty ) {
		return response()->json([
			"status" 	=> true,
			"message"	=> "Garantías disponibles",
			"data" 		=> $warranty
		], 200);
	}

	public function store( Request $request ) {
		dd($request->all());
	}

	public function close( $niv, $state ) {
		return $this->wapi->closeWarranty($niv, $state );
	}

	public function logout() {
		return $this->wapi->logout();
	}
}

/* End of Controller WarrantyApiController.php */