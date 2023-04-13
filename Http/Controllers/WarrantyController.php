<?php 
namespace Delta\Http\Controllers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Delta\Http\Support\Warranty;
use Delta\Http\Request\WarrantyRequest;
use Delta\Http\Request\UpdateWarrantyRequest;

class WarrantyController extends Controller {

	public function __construct( Warranty $support ) {
		$this->boot($support);
	}

	// public function info( $dealer, $client ) {

	// 	return $this->render(
	// 		"dealers.warranty.info", 
	// 		$this->support->info( $this->user(), $dealer, $client )
	// 	);
	// }

	// public function add($dealer) {
	// 	return $this->render(
	// 		"dealers.warranty.add", 
	// 		$this->support->add($this->user(), $dealer)
	// 	);
	// }

	// public function zoneAjax( $dealer, $src ) {
	// 	return $this->support->soneAjax($this->user(), $dealer);
	// }

	// public function register( $dealer, WarrantyRequest $request ) {
	// 	return $this->support->register($dealer, $request);
	// }

	// public function edit( $dealer, $customer ) {

	// 	return $this->render(
	// 		"dealers.warranty.edit", 
	// 		$this->support->edit($this->user(), $dealer, $customer)
	// 	);
	// }

	// public function update( $dealer, $customer, UpdateWarrantyRequest $request ) {

	// 	return $this->support->update( 
	// 		$this->user(), $dealer, $customer, $request 
	// 	);
	// }

	// public function delete( $dealer, $customer ) {
	// 	return $this->support->delete( $this->user(), $dealer, $customer );
	// }
}

/* End of Controller WarrantyController.php */