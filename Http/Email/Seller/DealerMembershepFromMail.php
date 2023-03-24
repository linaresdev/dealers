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

class DealerMembershepFromMail extends Mailable {

	use Queueable, SerializesModels;

	public $token;

	public $guardMail;

	public $dealer;

	public $subject;

	public function __construct( $token, $guardMail, $entity ) {
		$this->token 		= $token;
		$this->guardMail 	= $guardMail;
		$this->dealer 		= $entity->slug;
		$this->subject 		= "Solicitud temporal de registro";
		
	}

	public function build() {
		return $this->from("notificaciones@deltacomercial.com.do")
					->view("delta::app.sellers.mailers.register.userdealer");
	}
}

/* End of Controller GetMembershepFromMail.php */