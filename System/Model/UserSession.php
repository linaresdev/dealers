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

		$actions["path"]		= request()->path();
		$actions["device"] 		= $user->currentDevice();
		$actions["platform"] 	= $user->currentPlatform();
		$actions["browser"]		= $user->currentBrowser();

		$data["action"] 		= $actions;		
		
		return $this->create($data);
	}
	
}

/* End of Model UserSession.php */