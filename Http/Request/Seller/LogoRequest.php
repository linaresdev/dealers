<?php 
namespace Delta\Http\Request\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "logo"      =>[
                'required',
                "max:300",
                "mimes:png,jpg,jpeg,bmp,gif",
                Rule::dimensions()->maxWidth(1000)->maxHeight(600)
            ]
        ];
    }

    public function attributes() {
        return [
        ];
    }

    public function messages() {
    	return [
    		"unique"	=> __("form.error.unique"),
            "max"       => __("form.error.img-max"),
            "dimensions" => __("form.error.dimensions"),
            "mimes"     => __("form.error.mimes")
    	];
    }
}

/* End of RegisterRequest.php */