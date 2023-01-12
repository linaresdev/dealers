<?php 
namespace Delta\Http\Request\Ruls;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\InvokableRule;

class ZoneRul implements InvokableRule {

	public function __invoke( $attribute, $value, $fail ) {
       	
       	$data = new \Delta\Model\Zona();

		if( $data->where("description", $value)->count() > 0 ) {
			return TRUE;
		}

		$fail(__("form.error.exists"));
    }
}

/* End of Controller LoginRul.php */