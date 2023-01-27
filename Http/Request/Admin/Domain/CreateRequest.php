<?php 
namespace Delta\Http\Request\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest {	
	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"group" 	=> "required|unique:users_groups,group",
            "icon"      => "required"
        ];
    }

    public function attributes() {
        return [
            "group"         => __("words.organization"),
            "icon"          => __("words.icon")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique")
    	];
    }
}

/* End of CreateRequest.php */