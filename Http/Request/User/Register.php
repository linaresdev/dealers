<?php 
namespace Delta\Http\Request\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"firstname"		=> "required",
        	"lastname"		=> "required",
        	"email"			=> "required",
        	"rnc"			=> "required",
        	"pwd"			=> "required",
        	"passconfirm"	=> "same:pwd",

        ];
    }
}

/* End of Register.php */