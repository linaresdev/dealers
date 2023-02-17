<?php 
namespace Delta\Http\Request\Dealer;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "firstname"		=> "required",
            "lastname"		=> "required",
            "user"			=> "required|unique:users,user",
            "email"			=> "required|unique:users,email",
            "password"		=> "Required|min:6"
        ];
    }

    public function attributes() {
        return [
            "firstname"  => __("words.firstname"),
            "lastname"   => __("words.lastname"),
            "user"       => __("words.user"),
            "email"      => __("words.email"),
            "password"   => __("words.password")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique")
    	];
    }
}

/* End of UserRegister.php */