<?php 
namespace Delta\Http\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Profiler {	

	public function __construct( ) {
	}

	public function share() {
		return [
			"layout" => "layout-md"
		];
	}

	public function index($user) {
		$data["title"] 	= __("words.profile");
		$data["user"] 	= $user;

		return $data;
	}

	public function updateAccount($user) {
		$data["title"] 	= __("update.account");
		$data["user"] 	= $user;

		return $data;
	}

	public function saveAccount($user, $request) {

		$user->user 	= $request->user;
		$user->rnc 		= $request->rnc;
		$user->email 	= $request->email;

		if($user->save()) {
			return back();
		}

		return back();
	}

	public function updateCredential($user, $request) {

		$user->fullname 	= ($request->firstname." ".$request->lastname);
		$user->publicname 	= $request->publicname;

		if( $user->save() ) {

			$user->saveMeta("info", "firstname", $request->firstname);
			$user->saveMeta("info", "lastname", $request->lastname);

			return back();			
		}
		
		return back();
	}

	public function updateContact( $user, $request ) {
		
		$user->cellphone = $request->cellphone;

		if( $user->save() ) {
			$user->saveMeta("info", "phone", $request->phone);

			return back();
		}

		return back();
	}

	public function updateAddress( $user, $request ) {
		$user->saveMeta("info", "address", $request->address);
		
		return back();
	}

	public function updatePassword($user) {

		$data["title"] 	= __("update.password");
		$data["user"] 	= $user;

		return $data;
	}

	public function savePassword( $user, $request ) {
		
		$user->password = $request->pwd;

		if($user->save()) {

			auth("web")->logout();

			return back();
		}

		return back();
	}

	public function config( $user ) {

		$data["title"] 	= __("words.config");
		$data["user"] 	= $user;

		return $data;
	}
}
