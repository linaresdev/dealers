<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class CredentialRequest extends FormRequest {	

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "firstname" 	=> "required",
			"lastname"		=> "required",
			"publicname" 	=> "required"
        ];
    }

    public function attributes() {
        return [
            "firstname" 	=> __("words.firstname"),
			"lastname"		=> __("words.lastname"),
			"publicname" 	=> __("words.publicname")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required")
    	];
    }
}

/* End of CredentialRequest.php */