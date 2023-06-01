<?php 
namespace Delta\Http\Support\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Group;
use Delta\Model\UserReset;
use Delta\Model\UserSession;
use Delta\Alert\Facade\Alert;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Delta\Http\Email\Seller\DealerMembershepFromMail;

class UserSupport {

	protected $user;

	public function __construct( User $user ) {
		$this->user = $user;

		app("urls")->addTag("urls", [
			"__smail" => "dealers/__s2"
		]);
	}

	public function getUsersFrom( $group ) {
		return $group->users()->orderBY('id', 'DESC')->paginate(10);
	}

	public function index( $user, $dealer ) {

		app("urls")->addTag("urls", [
			"__detach" => "dealers/__s2/users/detach"
		]);

		//dd(now()->addMinutes(1080));

		$data["title"] 		= __("words.users");
		$data["layout"]		= "layout-sm";
		$data["user"]		= $user;
		$data["ent"] 		= $dealer;
		$data["users"]		= $this->getUsersFrom($dealer);

		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function register( $user, $dealer ) {		

		$data["title"] 		= __("words.register");
		$data["user"]		= $user;
		$data["ent"] 		= $dealer;

		$data["layout"]		= "layout-sm";
		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function userCreate( $dealer, $request ) {
		$profiler = (new Group)->where("slug", "profiler")->first() ?? null;
		$warranty = (new Group)->where("slug", "warranty")->first() ?? null;
		
		$this->user->fullname 	= $request->firstname.' '.$request->lastname;
		$this->user->publicname = $request->firstname;
		$this->user->user 		= $request->user;
		$this->user->email 		= $request->email;
		$this->user->password 	= $request->password;
		$this->user->activated  = 1;

		if($this->user->save()) {
			
			$this->user->orgSync($warranty->id);
			$this->user->orgSync($warranty->id);
			$this->user->orgSync($dealer->id);

			Alert::prefix("system")->success( __("register.successfull") );

			return redirect(__url("__entity/users"));
		}

		(new UserSession)->news("jobs", [
			"status" 	=> 202,
			"action"	=> "Create",
			"subject"	=> "Se creo el usuario {$this->user->fullname}",
			"registro"	=> $dealer->id,
			"user"		=> $this->user->id, 
			"path"		=> request()->path(),
		]);

		Alert::prefix("system")->success(__("register.successfull"));

		return back();
	}

	public function info( $entity, $user ) {

		$data["title"] 		= __("words.information");
		$data["layout"]		= "layout-md";
		$data["user"]		= $user;
		$data["ent"] 		= $entity;

		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function createFromSendMail( $entity ) {
		
		$data["title"] 		= __("register.sendmail");
		$data["ent"] 		= $entity;	

		$data["layout"]		= "layout-sm";
		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function registerFromSendmail( $entity, $user, $request ) {

		($UI = (new UserReset))->where("email", $request->email)->delete();
		
		$authMailForm = $UI->create([
			"type"		=> "request",
			"email"		=> $request->email,
			"expired"	=> now()->addMinutes(1080),
			"token"		=> ($token = \Str::random(mt_rand(15, 45)))
		]);

		Mail::to($request->email)->send( 
			new DealerMembershepFromMail($token, $authMailForm, $entity) 
		);

		Alert::prefix("system")->success(
			"Solicitud enviada correctamente"
		);
		
		return back();
	}

	public function add( $ent ) {		
		
		$data["title"] 	= __("user.add");
		$data["ent"]	= $ent;

		$data["layout"]	= "layout-sm";
		
		$data["isOn"] 	= (function($url) {
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}

	public function ajaxUsers( $ent, $src ) {

		app("urls")->addTag("urls", [
			"__sync" => "__entity/users/sync"
		]);

		$noID = function($ent) {
			$IDS=[];

			foreach( $ent->users as $user) {
				$IDS[] = $user->id;
			}

			return $IDS;
		};

		$data["users"] = (new User)->whereNotIn('id', $noID($ent))->where("fullname", 'LIKE', '%'.$src.'%')->take(10)->get();

		return $data;
	}

	public function syncUser($ent, $ID) {
		$ent->syncUser($ID);

		(new UserSession)->news("jobs", [
			"status" 	=> 202,
			"action"	=> "Sync User",
			"subject"	=> "Se agrego un usuario en $ent->group",
			"registro"	=> $ID,
			"path"		=> request()->path(),
		]);	

		return redirect(__url("__entity/users"));
	}

	public function detachUser($ent, $ID) {
		
		$ent->users()->detach($ID);	

		(new UserSession)->news("jobs", [
			"status" 	=> 202,
			"action"	=> "Remove User",
			"subject"	=> "Remover usuario $ent->group",
			"registro"	=> $ID,
			"path"		=> request()->path(),
		]);	

		return redirect(__url("__entity/users"));
	}

	public function rol( $ent, $user ) {	
		
		$data["title"] 	= __("user.rol");
		$data["ent"]	= $ent;
		$data["layout"] = "layout-md";
		$data["user"]	= $user;
		$data["rol"]	= $user->group($ent->slug)->pivot;
		
		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});

		return $data;
	}



	public function updateRol( $ent, $user, $request ) {

		$data["view"] 	= 0;
		$data["insert"] = 0;
		$data["update"] = 0;
		$data["delete"] = 0;

		foreach($request->all() as $key => $value ) {
			if( array_key_exists($key, $data)) {
				$data[$key] = $value;
			}
		}

		if( ($user->group($ent->slug)->pivot)->update($data)) {
			Alert::prefix("system")->success(__("rol.update.successfull"));
			return back();
		}

		(new UserSession)->news("jobs", [
			"status" 	=> 202,
			"action"	=> "Update Rol",
			"subject"	=> "Actualización Rol $user->fullname",
			"registro"	=> $user->id,
			"path"		=> request()->path(),
		]);

		Alert::prefix("system")->error(__("rol.update.error"));
		
		return back();
	}
}

/* End of Controller WarrantySupport.php */