<?php 
namespace Delta\Http\Request\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "logo"		=> "required",
            "phone"		=> "required",
            "email"		=> "required",
            "address" 	=> "required",
        ];
    }

    public function attributes() {
        return [
            "phone"         => __("words.phone"),
            "email"         => __("words.email"),
            "address"         => __("words.address"),
        ];
    }

    public function messages() {
    	return [
    		"required"	=> __("form.error.required")
    	];
    }
}

/* End of OrganizationRequest.php */