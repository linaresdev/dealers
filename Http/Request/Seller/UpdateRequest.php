<?php 
namespace Delta\Http\Request\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"group"		=> "required",
            "phone"		=> "required",
            "email"		=> "required",
            "address"	=> "required"
        ];
    }

    public function attributes() {
        return [
            "group"      => __("entity.name"),
            "phone"      => __("words.phone"),
            "email"      => __("words.email"),
            "address"    => __("words.address")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required")
    	];
    }
}

/* End of RegisterRequest.php */