<?php 
namespace Delta\Http\Support\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\UserSession;

class EntitySupport {

	protected $app;

	public function __construct( ) {
	}

	public function index($ent) {

		$data["title"] 		= __("words.entities");
		$data["ent"]		= $ent;		
		$data["layout"]		= "layout-sm";
		$data["users"]		= $ent->users;

		$data["users_on"] 	= $ent->users()->where("activated", 1)->count();
		$data["users_off"] 	= $ent->users()->where("activated", 0)->count();

		$data["warranties"]		= $ent->customer;
		$data["warranties_on"]	= $ent->customer()->where("state", 2)->count();
		$data["warranties_off"]	= $ent->customer->where("state", "<", 2)->count();

		$data["jobs"]		= $this->getJobs(6);

		$data["isOn"] = (function($url){
			if( $url == request()->path()) {
				return " active";
			}
		});
		
		return $data;
	}

	public function getJobs($perpage) { 
		return (new UserSession)->where("type", "jobs")
								->where("user_id", auth("web")->user()->id)
								->orderBY("id", "DESC")
								->paginate($perpage);
	}

	public function close($niv, $state) {
		return response()->json([
			"state" => true,
			"data" => [
				"niv" => $niv,
				"state" => $state
			],
			"data" => null
		], 200);
	}
}

/* End of Controller EntitySupport.php */