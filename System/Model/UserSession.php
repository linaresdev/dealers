<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Support\Guard;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model {

	protected $table = "users_session";

	protected $fillable = [
		"id",
		"user_id",
		"type",
		"guard",
		"token",
		"host",
		"httphost",
		"url",
		"agent",
		"action",
		"activated",
		"created_at",
		"updated_at"
	];

	public function user() {
		return $this->hasOne(\Delta\Model\User::class, "id", "user_id");
	}

	public function storMeta( $user ) {
		return [
			"ip"		=> request()->ip(),
			"path" 		=> request()->path(),
			'device'	=> $user->currentDevice(),
			"platform"	=> $user->currentPlatform(),
			"browser"	=> $user->currentBrowser(),
			"date"		=> now()
		];
	}

	public function setActionAttribute( $value ) {
		if( is_array($value) ) {
			$this->attributes['action'] = json_encode( $value );
		}
	}

	public function getActionAttribute( $value ) {
		return json_decode($value);
	}

	public function defaultAttributes() {

		return [
		    "method"    	=> request()->method(),
		    "url"       	=> request()->fullUrl(),
		    "host"        	=> request()->ip(),
		    "agent"    		=> request()->userAgent(),		    
		];
	}

	public function news($type="news", $actions=[] ) {
		$data 				= $this->defaultAttributes();

		$data["type"]		= $type;
		$data["user_id"] 	= ($user = auth("web")->user())->id ?? 0;
		$data["token"]		= auth("web")->getSession()->getID() ?? null;

		$data["action"] 		= $this->storMeta($user);		
		
		return $this->create($data);
	}

	public function passwordExpiredClose() {
		$this->activated = 0; return $this->save();
	}
	
	public function retrievePassword( $user, $token ) {

		$data["type"] 		= "retrieve-password";
		$data["user_id"] 	= $user->id;
		$data["token"]		= $token;
		$data["action"]		= $this->storMeta($user);

		return $this->create($data);
	}

	public function getUserFromRetrieve($type, $token) {
		return $this->where("type", $type)
					->where("token", $token)
					->where("activated", 1)
					->first() ?? null;
	}
}

/* End of Model UserSession.php */