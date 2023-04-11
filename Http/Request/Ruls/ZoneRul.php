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

class ZoneRul implements Rule {

	public function passes( $attribute, $value ) {
       	
       	$data = new \Delta\Model\Zona();

		if( $data->where("description", $value)->count() > 0 ) {
			return TRUE;
		}

		return false;
    }

    public function message() {
    	return __("form.error.exists");
    }
}

/* End of Controller LoginRul.php */