<?php 
namespace Delta\Http\Request\Ruls;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\UserReset;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\InvokableRule;

class MailMembershipRol implements InvokableRule {

	public function __invoke( $attribute, $value, $fail ) {

		$minLen = (strlen($value) < config("membership.token.max.len", 15));
		$maxLen = (strlen($value) > config("membership.token.min.len", 45));

		if( empty($value) ) {
			$fail(__("request.membership.empty"));
		}

		if( $minLen OR $maxLen ) {
			if( empty( ($token = (new UserReset)->getRequest($value)) ) ) {
				$fail( __("request.membership.corrupted") );
			}
		}

		if( ($token = (new UserReset)->getRequest($value)) == null ) {
			return $fail(__("request.membership.empty"));
		}

		if( $token->currentMinut() > config("membership.minut.max", 1080) ) {
			$fail(__("request.membership.deprecated"));
		}
    }
}

/* End of Controller LoginRul.php */