<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class App extends Model {

	protected $table = "apps";

	protected $fillable = [
		"id",
		"user_id",
		"type",
		"description",
		"comment",
		"method",
		"path",
		"token",
		"hash",
		"controller",
		"state",
		"created_at",
		"updated_at"
	];

	public function getPathAttribute( $value ) {
		return str_replace('{token}', $this->token, $value);
	}

	//public $timestamps = false;

	//protected $dateFormat = 'U';
}

/* End of Model App.php */