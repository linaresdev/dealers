<?php 
namespace Delta\Http\Request\Admin\Domain;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "group"			=> "required",
            "description" 	=> "required"
        ];
    }

    public function attributes() {
    	return [
    		"group" 		=> "Grupo o Función",
    		"description" 	=> "Descripción"
    	];
    }

    public function messages() {
    	return [
    		"required"	=> __("form.error.required")
    	];
    }
}

/* End of RolRequest.php */