<?php 
namespace Delta\Http\Request\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class MailMembershipRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "firstname" 	=> "required",
            "lastname" 		=> "required",
            "cellphone" 	=> "required|unique:users,cellphone",
            "rnc" 			=> "required|unique:users,rnc",
            "email" 		=> "required|unique:users,email",
            "pwd" 			=> "required",
            "rpwd"			=> "required"
        ];
    }

    public function attributes() {
    	return [
    		"firstname" => __("words.firstname"),
    		"lastname" 	=> __("words.lastname"),
    		"cellphone" => __("words.cellphone"),
    		"rnc" 		=> __("words.rnc"),
    		"email" 	=> __("words.email"),
    		"pwd" 		=> __("words.password"),
    		"rpwd" 		=> __("words.rpwd"),
    	];
    }
}

/* End of MailMembershipRequest.php */