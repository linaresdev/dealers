<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\App;
use Delta\Alert\Facade\Alert;

class AppSupport {

	protected $app;

	protected $ranges;

	public function __construct( App $app) {	
		$this->app = $app;

		$this->start 	= mt_rand(30, 60);
		$this->end 		= mt_rand(60, 100);

	}

	public function index() {

		$data["title"] 	= __("words.app");
		$data["apps"]	= $this->getApps(10);

		return $data;
	}

	public function getApps($perpage) {
		return $this->app->orderBY("id")->paginate($perpage);
	}

	public function addApp() {

		$data["title"] = __("words.app");

		return $data;
	}

	public function tokenize($data) {

		$data["user_id"] 	= login()->id;
		$data['token'] 		= \Str::random(mt_rand($this->start, $this->end));
		$data["hash"]		= \Hash::make($data['token']);
		$data["path"]		= "app/{token}/".$data["path"];

		return $data;
	}

	public function create( $request ) {

		if( $this->app->create($this->tokenize($request->except("_token"))) ) {
			Alert::prefix("system")->success("register.successfull");

			return redirect(__url("__admin/apps"));
		}
		
		Alert::prefix("system")->error("register.error");		

		return back();
	}

	public function show( $api ) {
		$data["title"] 	= __("words.app");
		$data["api"]	= $api;

		return $data;
	}

	public function edit( $api ) {
		$data["title"] 	= __("words.update");
		$data["api"]	= $api;

		return $data;
	}

	public function update( $api, $request ) {

		if($api->update($request->except("_token")) ) {
			Alert::prefix("{$api->type}-{$api->id}")->success(__("update.successfull"));
			return redirect(__url("__admin/apps") );
		}

		Alert::prefix("{$api->type}-{$api->id}")->success(__("update.error"));
		return back();
	}

	public function toggle( $api ) {

		if($api->state == 0 ) {
			$this->setState($api, 1);		
		}
		else{
			$this->setState($api, 0);
		}

		return redirect(__url("__admin/apps") );
	}

	public function setState($api, $state=0) {
		$api->state = $state;

		if($api->save()) {
			Alert::prefix("{$api->type}-{$api->id}")->success(
				__("toggle.set.$state")
			);

			return $api;
		}

		Alert::prefix("{$api->type}-{$api->id}")->success(
			__("toggle.set.$state")
		);

		return $api;
	}

	public function delete( $api ) {
		if($api->delete()) {
			Alert::prefix("system")->success("delete.successfull");
			return redirect( __url(__("__admin/apps")) );
		}

		Alert::prefix("system")->success( __("delete.error"));
		return back();
	}
}

/* End of Controller AuthSupport.php */