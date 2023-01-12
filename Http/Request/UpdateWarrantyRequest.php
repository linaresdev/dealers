<?php 
namespace Delta\Http\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarrantyRequest extends FormRequest {	
	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "customer" 	=> "required",
			"address"	=> "required",
			"rnc"		=> "required",
			"email"		=> "required|email"
        ];
    }

    public function attributes() {
        return [
            "niv"           => __("words.reference"),
            "customer"      => __("client.name"),
            "address"       => __("client.address"),
            "rnc"           => __("client.rnc"),
            "email"         => __("client.email"),
            "cellphone"     => __("client.cellphone")
        ];
    }

    public function messages() {
        return [
            "required"  => __("form.error.required"),
        ];
    }
}

/* End of UpdateWarrantyRequest.php */