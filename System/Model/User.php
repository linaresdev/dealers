<?php namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Support\Guard;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {	
	
	use HasApiTokens, HasFactory, Notifiable;

   	protected $table = "users";

	protected $fillable = [
		"fullname",
		"publicname",
		"rnc",
		"user",
		"cellphone",
		"email",
		"email_verified_at",
		"password",
		"avatar",
		"activated",
		"created_at",
		"updated_at"
	];

	protected $hidden = [
	  'password', 'remember_token',
	];

	protected $casts = [
	  'email_verified_at' => 'datetime',
	];

	/*
	* SETTINGS */
	public function setPasswordAttribute($value) {
	  $value = trim($value);
	  $value = bcrypt($value);
	  $this->attributes['password'] = $value;
	}

	/*
	* RELATIONS */
	public function meta() {
		return $this->hasMany(UserMeta::class, "user_id");
	}

	public function getMeta( $type=null, $key=null ) {
		if( !empty($type) ) {

			$query = $this->meta()->where("type", $type);

			if( !empty($key) ) {
				if(($info = $query->where("key", $key)->first()?? null) != null ) {
					return $info->value ;
				}

				return $info;
			}

			return $query->get();
		}		
	}

	public function info( $key ) {
		return $this->getMeta("info", $key);
	}

	public function hasMeta( $type, $key) {
		return(
			$this->meta()->where("type", $type)
				 ->where("key", $key)->count() > 0
		);
	}

	public function saveMeta( $type, $key, $value ) {
		$meta = $this->meta();

		if( $this->hasMeta($type, $key) ) {
			$meta->where("type", $type)->where("key", $key)->update([
				"value" => $value
			]);
		}
		else {
			$meta->create(["type" => $type, "key" => $key, "value" => $value]);
		}
	}

	public function loadConfig() {

		$file = "auth".$this->id."_config_meta.php";

		// if( app("files")->exists(__path("__meta/$file")) ) {	
		// 	dd(app("files")->getRequire(__path("__meta/$file")));
		// }

	}

	public function groups() {
		return $this->belongsToMany( Group::class, "users_groups_pivots", "user_id", "group_id")->withPivot(
		  "view", "insert", "update", "delete"
		);
    }

    public function group($slug) {
    	return $this->groups->where("slug", $slug)->first();
    }

    public function org($slug) {
    	return $this->groups->where("type", "organization")->where("slug", $slug)->first() ?? null;
    }

    public function orgParents($ID) {
    	return $this->groups->where("parent", $ID);
    }

    public function orgHasParents($ID) {
    	return ($this->groups->where("parent", $ID)->count() > 0);  
    }

    public function hasOrg($type) {
    	return ( $this->groups->where("type", "organization")->count() > 0);
    }

    public function groupID($group) {
    	if( ($query = (new Group)->where("slug", $group)->first()) ?? null ) {
    		return $query->id;
    	}
    }

    public function load($ui) {
    	
    	return $this->where("id", $ui)
    				->orWhere("email", $ui)
    				->orWhere("rnc", $ui)
    				->orWhere("cellphone", $ui)
    				->first() ?? null;
    }

    public function orgID( $slug ) {

    	$ORG = new Group;
    	$ORG->where("type", "organization");
    	$ORG->where("slug", $slug);
    	$ORG->first() ?? NULL;

    	if( ($data = $ORG->first()) ?? FALSE  ) {
    		return $data->id;
    	}
    }

    public function orgSync( $ID, $rols=null ) {

    	if( !empty($rols) && is_array($rols) ) {
    		return $this->groups()->attach([$ID => $rols]);
    	}

    	return $this->groups()->attach($ID);
    }

    public function syncGroup( $group, $rols ) {
    	if( is_numeric( ($ID = $this->groupID($group)) ) ) {
	    	$this->groups()->attach([$this->groupID($group) => $rols]);    		
    	}
	}

	public function isRol($slug) {
		return ($this->groups->where("slug", $slug)->count() > 0);
	}

	public function rols() {
		return $this->groups->where("type", "rol");
	}

	public function hasRol($slug) {
		return ($this->groups->where("type", "rol")->where("slug", $slug)->count() > 0);
	}

	public function rol($slug) {
		
		$data = $this->groups->where("type", "rol")
					->where("slug", $slug)->first();

		$data->view 	= $data->pivot->view;
		$data->insert 	= $data->pivot->insert;
		$data->update 	= $data->pivot->update;
		$data->delete 	= $data->pivot->delete;

		return $data;
	}

	public function hasDealer() {
		return ($this->groups->where("type", "dealer")->count() > 0 );
	}
	public function dealers() {
		return $this->groups->where("type", "dealer");
	}

	public function getDealers() {
		return $this->groups()->where("type", "dealer")->get();
	}

	/*
	* SESSION */
	public function session() {
		return $this->hasMany(UserSession::class, "user_id");
	}

	public function sessID( $guard="web" ) {
		return auth($guard)->getSession()->getId();
	}

	public function getSession() {
		return $this->session()->where("token", $this->sessID())->first() ?? null;
	}

	public function closeLastSession($type, $sessID ) {
		if( ($sess = $this->session()->where("token", $sessID)->first()) ?? false ) {
			$sess->activated = 2; $sess->save();
		}
	}

	public function logout( $guard="web" ) {

		if( ($sess = $this->getSession()) != null ) {
			$sess->activated = 2;
			$sess->save();
		}

		auth("web")->logout();

		return redirect('/');
	}

	/*
	* CURRENT */
	public function currentDevice() {
		return (new Guard)->device(request()->userAgent());
	}
	public function currentPlatform() {
		return (new Guard)->getPlatform(request()->userAgent());
	}
	public function currentBrowser() {
		return (new Guard)->getBrowser(request()->userAgent());
	}
	public function currentRobot() {
		return (new Guard)->getRobot(request()->userAgent());
	}
}

/* End of Model User.php */