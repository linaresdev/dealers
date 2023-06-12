<?php 
namespace Delta\Http\Email\Admin;

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

class RetrievePassword extends Mailable {

	use Queueable, SerializesModels;

	public $user;

	public $token;

	public function __construct( $user, $token ) {
		$this->user 		= $user;
		$this->token 		= $token;
		$this->subject 		= __("retrieve.password");		
	}

	public function build() {
		return $this->from("notificaciones@deltacomercial.com.do")
					->view("delta::admin.users.mailers.retrievepass");
	}
}

/* End of Controller GetMembershepFromMail.php */