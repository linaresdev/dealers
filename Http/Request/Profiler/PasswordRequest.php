<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Request\Profiler\PwdRul;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest {	

	public function authorize() {		
        return true;
    }

    public function rules() {
        return [
            "oldpwd" 	=> ["required", new PwdRul($this->request)],
            "pwd" 		=> "required",
            "rpwd" 		=> "required|same:pwd"
        ];
    }

    public function attributes() {
        return [
            "oldpwd" 	=> __("old.password"),
			"pwd"		=> __("new.password"),
			"rpwd" 		=> __("password.confirm")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"same"		=> __("password.same.bad")
    	];
    }
}

/* End of PasswordRequest.php */