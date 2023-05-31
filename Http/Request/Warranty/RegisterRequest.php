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
            "address"   => "required|max:50",
            "rnc"		=> "required",
            "email"		=> "required|email",
            "cellphone"	=> "required",
            "sector"    => ["required", new ZoneRul()],
            "address"   => "required"
        ];
    }

    public function attributes() {
        return [
            "niv"           => __("words.reference"),
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
        ];
    }

    public function withValidator( $validator ) {

        $validator->after( function ( $validator ) {
            if( $validator->errors()->any() ) {
                $validator->errors()->add(
                    'noty', 'Todos los campos son requeridos'
                ); 
            }            
        });
    }
}

/* End of RegisterRequest.php */