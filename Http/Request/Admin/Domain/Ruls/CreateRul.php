<?php 
namespace Delta\Http\Request\Admin\Domain\Ruls;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;
use Illuminate\Contracts\Validation\Rule;

class CreateRul implements Rule {

	protected $message = "Error al tratar de procesar la solicitud";	

	public function passes( $attribute, $value ) {
		if( (new Group)->where("type", "organization")->where("slug", \Str::slug($value))->count() > 0 ) {
			$this->message = __("form.error.unique");

			return false;
		}
	
        return TRUE;
    }

    public function message() {
    	return $this->message;
    }
}

/* End of Controller CreateRul.php */