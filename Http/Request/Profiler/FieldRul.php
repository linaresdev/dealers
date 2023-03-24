<?php 
namespace Delta\Http\Request\Profiler;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\InvokableRule;

class FieldRul implements InvokableRule {

	protected $app;

	public function __construct($field, ) {
	}

	public function __invoke( $attribute, $value, $fail ) {
		
	}
}

/* End of Controller FildRul.php */