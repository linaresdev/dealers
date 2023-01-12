<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

	protected $table = "users_meta";

	protected $fillable = [
		"id",
		"user_id",
		"type",
		"key",
		"value",
		"activated"
	];

	public $timestamps = false;

	//protected $dateFormat = 'U';
}

/* End of Model UserMeta.php */