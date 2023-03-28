<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserReset extends Model {

	protected $table = "users_reset";

	protected $fillable = [
		"id",
		"type",
		"email",
		"token",
		"expired",
		"created_at",
		"updated_at"
	];

	public function getRequest($token) {
		return $this->where("type", "request")
				->where("token", $token)->first() ?? null;
	}

	public function currentMinut() {
		if($this->count() > 0 ){
			return $this->created_at->diffInMinutes();			
		}
	}
}

/* End of Model UserReset.php */