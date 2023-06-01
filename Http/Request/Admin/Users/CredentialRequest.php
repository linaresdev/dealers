<?php 
namespace Delta\Http\Request\Admin\Users;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class CredentialRequest extends FormRequest
{	
	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "fullname" 	=> "required|string",
            "email"		=> "required|string|email",
            "rnc"		=> "required|max:11",
            'cellphone'	=> "required|string",
        ];
    }
}

/* End of CredentialRequest.php */