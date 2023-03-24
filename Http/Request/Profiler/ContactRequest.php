<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"cellphone" => ["required", Rule::unique('users', 'cellphone')->ignore($this->request->get("id"))],
            "phone"		=> "required"
        ];
    }

    public function attributes() {
        return [
            "cellphone" 	=> __("words.cellphone"),
			"phone"			=> __("words.phone")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
            "unique"    => __("form.error.unique")
    	];
    }
}

/* End of ContactRequest.php */