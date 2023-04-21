<?php 
namespace Delta\Http\Controllers\Admin\Apps;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Http\Request\Admin\AppRequest;
use Delta\Http\Support\Admin\AppSupport;

class AppController extends Controller {

	public function __construct( AppSupport $support ) {
		$this->boot($support);	
	}

	public function index() {
		return $this->render("index", $this->support->index());
	}

	public function addApp() {
		return $this->render("formapp", $this->support->addApp());
	}

	public function create( AppRequest $request ) {
		return $this->support->create($request);
	}

	public function show( $api ) {
		return $this->render("show", $this->support->show($api));
	}

	public function edit( $api ) {
		return $this->render("update", $this->support->edit($api));
	}

	public function update( $api, AppRequest $request ) {
		return $this->support->update($api, $request);
	}

	public function toggle( $api ) {
		return $this->support->toggle($api);
	}

	public function delete( $api ) {
		return $this->support->delete($api);
	}
}

/* End of Controller AuthController.php */