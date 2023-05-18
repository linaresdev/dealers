<?php 
namespace Delta\Http\Support\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Customer;

class ClientSupport {	

	protected $client;

	public function __construct( Customer $client ){
		$this->client = $client;	
	}

	public function getClients($state=0) {
		return $this->client->where("state", $state)->get();
	}

	public function allPending() {
		return $this->getClients("0");
	}

	public function exceptionClient($niv) {
		return $this->closeClient( $niv );
	}

	public function close($niv) {
		return $this->closeClient( $niv );
	}
}

/* End of Controller ClientController.php */