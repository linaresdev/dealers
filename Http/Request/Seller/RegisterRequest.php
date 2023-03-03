<?php 
namespace Delta\Http\Request\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"group"		=> "required",
            "logo"      => "mimes:jpeg,jpg,png,gif|max:30024",
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
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique")
    	];
    }
}

/* End of RegisterRequest.php */