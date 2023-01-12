<?php 
namespace Delta\Http\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Request\Ruls\LoginRul;
use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest {

	public function authorize() {

        return true;
    }

    public function rules() {
        return [
            "email" => "required",
            "pwd"	=> "required"
        ];
    }

    public function messages() {
        return [
            "required"  => "Todos los campos son requeridos",
        ];
    }

    public function withValidator( $validator ) {

        $validator->after( function ( $validator ) {

            $data = request()->all();

            if( $validator->errors()->any() ) {
                if( (empty($data->email) OR empty($data->pwd))  ) {
                    $validator->errors()->add(
                        'login', 'Todos los campos son requeridos'
                    );
                } 
            }
            
        });
    }
}

/* End of Login.php */