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

	protected $table = "name";

	protected $fillable = [
		"email",
		"token",
		"path",
		"expired"
		"created_at",
		"updated_at"
	];

	//public $timestamps = false;

	//protected $dateFormat = 'U';
}

/* End of Model UserReset.php */