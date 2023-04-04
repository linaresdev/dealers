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
        	"fullname"		=> "required",
        	"email"			=> "required|unique:users,email",
        	"pwd"			=> "required",
        	"passconfirm"	=> "required|same:pwd",

        ];
    }
}

/* End of Register.php */