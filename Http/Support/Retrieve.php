<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\UserSession;
use Illuminate\Support\Facades\Mail;
use Delta\Http\Email\Admin\SecurityReport;
use Delta\Http\Email\Admin\UnknownRetrieve;

class Retrieve {

	public function getUsersFromRetrivePassword($token) {

	}
	public function password($token) {

		$sess = (new UserSession)->getUserFromRetrieve(
			"retrieve-password", $token
		);

		if( $sess == null ) abort(404);

		$data["title"] 	= __( "retrieve.password" );
		$data["user"] 	= $sess->user;
		$data["token"] 	= $token;

		return $data;
	}

	public function passwordUpdate( $request ) {

		if( ($user = (new User)->find($request->id)) ?? false ) {
			$user->password = $request->pwd;

			if($user->save()) {
				$sess = (new UserSession)->getUserFromRetrieve(
					"retrieve-password", $request->token
				);

				$sess->activated = 2;
				$sess->save();

				return redirect()->to("login");
			}
		}

		return back();
	}

	public function reportRetriveUnknown($token) {

		$retrieve = (new UserSession)->getUserFromRetrieve(
			"retrieve-password", $token
		);

		if($retrieve != null ) {

			$retrieve->activated = 3;

			//if($retrieve->save()) {

				$data["title"] 		= __("retrieve.report");
				$data["retrieve"] 	= $retrieve;
				$data["user"]		= $retrieve->user;
				$data["meta"]		= $retrieve->action;

				// Mail::to($data["user"])->send( 
				// 	new UnknownRetrieve( $data["user"], $retrieve->token ) 
				// );

				if( !empty( $mailSecurity = env("APP_NOTIFICATE")) ) {	
					if( !empty( $ccMail = env("APP_CC_NOTIFICATE")) ){
						Mail::to($mailSecurity)
							//->cc($ccMail)
							->send( 
								new SecurityReport( $data["user"], $retrieve 
							) 
						);
					}
					else {
						Mail::to($mailSecurity)->send( 
							new SecurityReport( $data["user"], $retrieve->token ) 
						);	
					}		
				}

				return $data;
			//}
		}		

		abort(404);		
	}
}

/* End of providers Home.php */