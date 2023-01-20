<?php namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

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

		if( app("files")->exists(__path("__meta/$file")) ) {	
			dd(app("files")->getRequire(__path("__meta/$file")));
		}

	}

	public function groups() {
		return $this->belongsToMany( Group::class, "users_groups_pivots", "user_id", "group_id")->withPivot(
		  "view", "insert", "update", "delete"
		);
    }

    public function group($slug) {
    	return $this->groups->where("slug", $slug)->first();
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

    public function syncGroup( $group, $rols ) {
    	if( is_numeric( ($ID = $this->groupID($group)) ) ) {
	    	$this->groups()->attach([$this->groupID($group) => $rols]);    		
    	}
	}

	public function isRol($slug) {
		return ($this->groups->where("slug", $slug)->count() > 0);
	}

	public function rol($slug) {
		return $this->groups->where("slug", $slug)->first()->pivot;
	}

	public function dealer() {		
		if( ($business = $this->group("dealers")) ) {
			return $business->dealer();
		}
	}

}

/* End of Model User.php */