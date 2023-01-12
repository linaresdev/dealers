<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model {

	protected $table = "users_session";

	protected $fillable = [
		"id",
		"user_id",
		"payload",
		"guard",
		"ip_address",
		"agent",
		"activated",
		"created_at",
		"updated_at"
	];

	//public $timestamps = false;

	//protected $dateFormat = 'U';
}

/* End of Model UserSession.php */