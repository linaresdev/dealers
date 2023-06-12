<?php 
namespace Delta\Http\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class RetrievePasswordRequest extends FormRequest {	

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "pwd" 	=> "required",
			"rpwd"	=> "required|same:pwd"
        ];
    }

    public function attributes() {
        return [
            "pwd"       => __("words.pwd"),
            "rpwd"      => __("words.rpwd"),
        ];
    }

    public function messages() {
        return [
            "required"  => __("form.error.required"),
            "same"      => __("password.same.bad")
        ];
    }
}

/* End of UpdateWarrantyRequest.php */