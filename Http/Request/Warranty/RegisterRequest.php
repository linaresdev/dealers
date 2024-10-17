<?php 
namespace Delta\Http\Request\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Request\Ruls\ZoneRul;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

	public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "date" => "required|date",
            "niv" => [
            	"required",
            	"min:8",
            	"max:8",
            	"unique:\Delta\Model\Customer,niv"
            ],
            "customer"	=> "required",
            "address"   => "required|max:40",
            "rnc"		=> "required",
            "email"		=> "required|email",
            "cellphone"	=> ["required", "numeric"],
            "sector"    => ["required", new ZoneRul()],
        ];
    }

    public function attributes() {
        return [
            "date"          => __("words.date"),
            "niv"           => "NIV",
            "customer"      => __("client.name"),
            "address"       => __("client.address"),
            "rnc"           => __("client.rnc"),
            "email"         => __("client.email"),
            "cellphone"     => __("client.cellphone")
        ];
    }

    public function messages() {
        return [
            "required"  => __("form.error.required"),
            "unique"    => __("form.error.unique"),
            "exists"    => __("form.error.exists"),
            "max"       => __("form.error.max"),
            "numeric"   => __("form.error.numeric"),
        ];
    }
}

/* End of RegisterRequest.php */