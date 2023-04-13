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

class AjaxSupport {

	protected $customer;

	protected $path = "delta::app.warranties.ajax.";

	public function __construct(Customer $customer) {
		$this->customer = $customer;
	}

	public function getWarranty($ID, $take) {
		return $this->customer
					->where("group_id", $ID)
					->orderBY("id", "DESC")
					->take($take)
					->get();
	}

	public function ajaxResponse($org, $method, $args=null) {
		if(method_exists($this, $method) ) {
			return $this->{$method}($org, $args);
		}
	}

	public function home($org, $args) {

		return $this->render("$args-warranties", [
			"warranties" => $this->getWarranty($org->id, 6)
		]);	
	}

	public function path($path='master') {
		return $this->path.$path;
	}

	public function render($view=NULL, $data=[], $mergeData=[]) {
		
		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}
}

/* End of Controller AjaxSupport.php */