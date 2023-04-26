<?php 
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Guard extends Model {

	protected $table = "guards";

	protected $fillable = [
		"id",
		"user_id",
		"method",
		"ip",
		"httphost",
		"url",
		"user_agent",
		"action",
		"created_at",
		"updated_at"
	];

	public function setActionAttribute( $value ) {
		if( is_array($value) ) {
			$this->attributes['action'] = json_encode($value);
		}
	}

	public function defaultAttributes() {
		return [
			"user_id"		=> auth("web")->user()->id ?? 0,
		    "ip"        	=> request()->ip(),
		    "method"    	=> request()->method(),
		    "httphost"  	=> request()->httpHost(),
		    "url"       	=> request()->fullUrl(),
		    "user_agent"    => request()->userAgent()
		];
	}

	public function add($data=[]) {

		$data = array_merge(
			$this->defaultAttributes(), ["action" => $data]
		);

		$this->create($this->defaultAttributes());
	}
}

/* End of Model Guard.php */