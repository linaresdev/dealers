<?php 
namespace Delta\Http\Request\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "description"	=> "required",
            "comment"       => "",
            "method"		=> "required",
            "path"			=> "required",
            "controller"	=> "required",
        ];
    }

    public function attributes() {
    	return [
            "description"	=> __("words.description"),
            'comment'       => __("words.comment"),
            "method"		=> __("words.method"),
            "path"			=> __("words.path"),
            "controller"	=> __("words.controller"),
        ];
    }
}

/* End of AppRequest.php */