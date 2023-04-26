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

class WapiController extends Controller
{	
	public function __construct( Customer $warranty )
	{	
		$this->warranty = $warranty;
	}

	public function index()
	{
		return $this->warranty->all();
	}

	public function show( Customer $warranty ) {
		return $warranty;
	}

	public function store( Request $request ) {
		dd($request->all());
	}
}

/* End of Controller WarrantyApiController.php */