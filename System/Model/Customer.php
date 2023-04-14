<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	protected $table = "customers";

	protected $fillable = [
		"id",
		"group_id",
		"user_id",
		"niv",
		"date",
		"customer",
		"rnc",
		"email",
		"phone",
		"cellphone",
		"code",
		"sector",
		"address",
		"avatar",
		"state",
		"created_at",
		"updated_at"
	];
}

/* End of Model Customer.php */