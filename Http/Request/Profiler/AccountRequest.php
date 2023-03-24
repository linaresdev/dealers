<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Validation\Rule;
use Delta\Http\Request\Profiler\FieldRul;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest {	

	public function authorize() {
        return true;
    }

    public function rules() {

    	$ID = $this->request->get("id");

        return [
            "user"	=> ["required", Rule::unique('users', 'user')->ignore($ID)],
            "rnc"	=> ["required", Rule::unique('users', 'rnc')->ignore($ID)],
            "email"	=> ["required", Rule::unique('users', 'email')->ignore($ID)]
        ];
    }

    public function attributes() {
        return [
            "user" 		=> __("words.user"),
			"rnc"		=> __("words.rnc"),
			"email" 	=> __("words.email")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique")
    	];
    }
}

/* End of AccountRequest.php */