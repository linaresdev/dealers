<?php 
namespace Delta\Http\Request\Ruls;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\InvokableRule;

class LoginRul implements InvokableRule {
	
	protected $noty;

    protected $request;

    public function __construct( $request ) {
        $this->request = $request;
    }

	public function __invoke( $attribute, $value, $fail ) {

        if( $attribute == "email" ) {
            if( empty($value) ) {
                $fail("Todos los campos son requeridos");
            }            
        }

    }

    public function message() {
    	return $this->noty;
    }
}

/* End of Controller LoginRul.php */