<?php 
namespace Delta\Http\Request\Admin\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest {	
	public function authorize()  {
        return true;
    }

    public function rules() {
        return [
            "pwd" 			=> "required|min:8",
            "passconfirm" 	=> "required|same:pwd"
        ];
    }

    public function attributes() {
    	return [
    		"pwd"	        => __("words.password"),
            "passconfirm"   => __("words.rpwd")
    	];
    }
}

/* End of PasswordRequest.php */