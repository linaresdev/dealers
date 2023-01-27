<?php 
namespace Delta\Http\Request\Admin\Domain;

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
        	"group" 	=> "required",
        ];
    }

    public function attributes() {
        return [
            "group"         => __("words.organization"),
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required")
    	];
    }
}

/* End of CreateRequest.php */