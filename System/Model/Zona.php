<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Zona extends Model {

	protected $table = "locations";

	protected $fillable = [
		"id",
		"code",
		"description"
	];

	public $timestamps = false;
}

/* End of Model Zona.php */