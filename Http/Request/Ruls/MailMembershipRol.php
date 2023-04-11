<?php 
namespace Delta\Http\Request\Ruls;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;
use Delta\Model\UserReset;
use Illuminate\Contracts\Validation\Rule;
#use Illuminate\Contracts\Validation\InvokableRule;

class MailMembershipRol implements Rule {

	protected $news;

	public function passes( $attribute, $value, $fail ) {

		$minLen = (strlen($value) < config("membership.token.max.len", 15));
		$maxLen = (strlen($value) > config("membership.token.min.len", 45));

		if( empty($value) ) {
			$this->news = __("request.membership.empty");
			return false;
		}

		if( $minLen OR $maxLen ) {
			if( empty( ($token = (new UserReset)->getRequest($value)) ) ) {
				$this->news = __("request.membership.corrupted");
				return false;
			}
		}

		if( ($token = (new UserReset)->getRequest($value)) == null ) {
			$this->news = __("request.membership.empty");
			return false;
		}

		if( $token->currentMinut() > config("membership.minut.max", 1080) ) {
			
			$token->delete();
			$this->news = __("request.membership.deprecated");
			return false;
		}

		return true;
    }

    public function message() {
		return $this->news;
	}
}

/* End of Controller LoginRul.php */