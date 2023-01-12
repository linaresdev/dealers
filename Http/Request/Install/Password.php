<?php 
namespace Delta\Http\Request\Install;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class Password extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "pwd" => "required|min:8"
        ];
    }

    public function attributes() {
    	return [
    		"pwd" => "contraseña "
    	];
    }

    public function messages() {
    	return [
    		"required" => "La :attribute es requerida",
    	];
    }
}

/* End of Password.php */