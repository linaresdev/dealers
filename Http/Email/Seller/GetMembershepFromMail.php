<?php 
namespace Delta\Http\Email\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetMembershepFromMail extends Mailable {

	use Queueable, SerializesModels;

	public $subject;

	public function __construct( $entity ) {
		$this->subject 		= "Get Membership";
	}

	public function build() {
		return $this->view("delta::app.dealers.users.mail.getmembership");
	}
}

/* End of Controller GetMembershepFromMail.php */