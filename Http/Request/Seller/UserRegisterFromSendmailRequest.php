<?php 
namespace Delta\Http\Request\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterFromSendmailRequest extends FormRequest {	

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "email"	=> ["required","unique:users,email"]
        ];
    }

    public function attributes() {
        return [
            "email"      => __("words.email")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique")
    	];
    }
}

/* End of UserRegisterFromSendmailRequest.php */