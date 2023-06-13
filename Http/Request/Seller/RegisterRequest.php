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

class RegisterRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
        	"group"		=> "required",
            "logo"      =>[
                "max:300",
                File::types(['png','jpg','jpeg','bmp','gif']),
                Rule::dimensions()->maxWidth(1000)->maxHeight(600)
            ],
            "phone"		=> "required",
            "email"		=> "required",
            "address"	=> "required"
        ];
    }

    public function attributes() {
        return [
            "group"      => __("entity.name"),
            "phone"      => __("words.phone"),
            "email"      => __("words.email"),
            "address"    => __("words.address")
        ];
    }

    public function messages() {
    	return [
    		"required" 	=> __("form.error.required"),
    		"unique"	=> __("form.error.unique"),
            "max"       => __("form.error.img-max"),
            "dimensions" => __("form.error.dimensions")
    	];
    }
}

/* End of RegisterRequest.php */