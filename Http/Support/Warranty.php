<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Zona;

class Warranty {

	protected $app;

	public function __construct() {
	}

	public function share() {
		return [
			"layout" => "layout-sm"
		];
	}

	public function info( $user, $dealer, $client ) {

		$data["title"] 		= __("words.information");
		$data["dealer"]		= $dealer;		
		$data["info"] 		= $dealer->datasheet();
		$data["client"] 	= $client;

		return $data;
	}

	public function add( $user, $dealer ) {

		$data["title"] 		= __("warranty.add");
		$data["dealer"]		= $dealer;
		$data["info"] 		= $dealer->datasheet();

		return $data;
	}

	public function register( $dealer, $request ) {

		$data = $request->all();
		$data["code"] = $this->getCodeZone($data['sector']);

		$dealer->addCustomer( $data );

		return redirect("dealer/".$dealer->group);
	}

	public function getCodeZone($description) {

		$data = (new Zona)->where("description", $description)->first() ?? null;

		if( !empty($data) ) {
			return $data->code;
		}
	} 

	public function edit( $user, $dealer, $customer ) {

		$data["title"] 		= __("client.update");

		$data["dealer"]		= $dealer;
		$data["customer"] 	= $customer;
		$data["info"] 		= $dealer->datasheet();

		return $data;
	}

	public function update( $user, $dealer, $customer, $request ) {

		$data = $request->all();
		$data["code"] = $this->getCodeZone($data['sector']);

		$customer->update( $data );

		return redirect("dealer/".$dealer->group);
	}

	public function delete( $user, $dealer, $customer ) {
		
		$customer->delete();

		return redirect("dealer/".$dealer->group);
	}
}

/* End of Controller Warranty.php */