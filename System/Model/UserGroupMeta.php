<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserGroupMeta extends Model {

	protected $table = "users_groups_metas";

	protected $fillable = [
		"id",
		"group_id",
		"slug",
		"value"
	];

	public $timestamps = false;

	//protected $dateFormat = 'U';
}

/* End of Model UserGroupMeta.php */