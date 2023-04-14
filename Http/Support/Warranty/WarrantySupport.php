<?php 
namespace Delta\Http\Support\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Delta\Model\Zona;
use Delta\Model\Customer;

class WarrantySupport {

	protected $customer;

	public function __construct( Customer $customer ) {	
		$this->customer = $customer;
	}

	public function share() {
		return [
			"layout"	=> "layout-sm"
		];
	}

	public function index( $user ) {

		$data["title"] 	= __( "words.warranty" );

		$data["user"]	= $user;

		return $data;
	}

	public function home( $org ) {

		$data["title"] 		= $org->group;
		$data["org"] 		= $org;
		
		$data["warranties"] = $this->getWarranty($org->id, 7);

		return $data;
	}

	public function show($org, $warranty) {
		$data["title"] 		= __("words.warranty");
		$data["org"]		= $org;
		$data["warranty"] 	= $warranty;

		return $data;
	}

	public function getWarranty($ID, $take) {
		return $this->customer
					->where("group_id", $ID)
					->orderBY("id", "DESC")
					->take($take)
					->get();
	}

	public function addWarranty( $org ) {		
		$data["title"] 		= __("warranty.form");
		$data["org"] 		= $org;

		$data["isError"]	= (function($field){
			if( session()->has("errors") ) {
				if(!empty( session()->get("errors")->first($field) ) ) {
					return ' is-invalid';					
				}
			}
		});

		return $data;
	}

	public function getCodeFromDescription($description) {
		return (new Zona)->where("description", $description)->first()->code;
	}

	public function saveWarranty( $org, $request, $user ) {

		$this->customer->group_id = $org->id;
		$this->customer->user_id = $user->id;
		$this->customer->niv = $request->niv;
		$this->customer->customer = $request->customer;
		$this->customer->rnc = $request->rnc;
		$this->customer->email = $request->email;
		$this->customer->cellphone = $request->cellphone;
		$this->customer->niv = $request->niv;
		$this->customer->address = $request->address;
		$this->customer->code = $this->getCodeFromDescription($request->sector);
		$this->customer->sector = $request->sector;
		
		if($this->customer->save()) {
			return redirect(__url("warranty/__s2"));
		}

		return back();
	}

	public function srcZone($org, $src) {

		$data["locations"] = (new Zona)->where(
			"description", "LIKE", '%'.$src.'%'
		)->take(6)->get();

		return $data;
	}
}

/* End of Controller HomeSupport.php */