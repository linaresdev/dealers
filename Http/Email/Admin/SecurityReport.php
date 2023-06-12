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

class SecurityReport extends Mailable {

	use Queueable, SerializesModels;

	public $user;

	public $retrieve;

	public $meta;

	public function __construct( $user, $retrieve ) {

		$this->user 		= $user;
		$this->retrieve 	= $retrieve;
		$this->meta 		= $retrieve->action;
		
		$this->subject 		= __("security.notification");	
	}

	public function build() {
		return $this->from("notificaciones@deltacomercial.com.do")
					->view("delta::admin.users.mailers.security");
	}
}

/* End of Controller GetMembershepFromMail.php */