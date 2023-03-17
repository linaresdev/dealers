<?php 
namespace Delta\Http\Support\Seller;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Group;
use Delta\Alert\Facade\Alert;

class SellerSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;
	}

	public function share() {

		$data["layout"] = "layout-md";
		$data["hasError"] = function($name) {
			if( session()->has("errors") ) {
				$errors = session()->get("errors");
				return $errors->first(
					$name, '<p class="error error-slow"> :message </p>'
				);
			}
		};

		return $data;
	}

	public function getDealers($perpage) {
		return $this->group->where("type", "dealer")
					->orderBY("id", "DESC")->get()->take(10);
	}

	public function index( $user ) { 
		
		$data["title"] 		= "Dealers";
		$data["dealers"] 	= $this->getDealers(10);

		return $data;
	}

	public function search($src) {

		$data["dealers"] = (new Group)->where("type", "dealer")
						->where("group", "LIKE", '%'.$src.'%')
						->get()->take(5);

		
		return $data;
	}

	public function register() {
		
		$data["title"] 		= __("dealer.new");
		
		return $data;
	}

	public function create( $request ) {
		
		$slug = \Str::slug($request->group);

		$meta["phone"] 		= $request->phone;
		$meta["email"] 		= $request->email;
		$meta["address"] 	= $request->address;

		if( $request->hasFile("logo") ) {

			$name = "logo.".$request->logo->getClientOriginalExtension();
			$path = "__uploads/images/dealers/$slug";
			$meta["logo"]	= $path."/".$name;

			$request->logo->move(__path($path), $name);
		}
		else {
			$meta["logo"] = __path("__uploads/images/dealers/toyota.png");
		}

		$group = $this->group->create([
			"parent"	=> $this->group->org("warranty")->id,
			"type" 		=> "dealer",
			"slug"		=> \Str::slug($request->group),
			"group" 	=> $request->group,
			"icon"		=> "storefront-outline"
		])->addMeta(
			"dealer", $meta
		);

		if( ($org = $this->group->org("warranty"))->count() > 0 ) {
			$org = $org->first();
		}

		Alert::prefix("system")->success(__("register.successfull"));

		return redirect("seller");
	}

	public function edit( $user, $dealer ) {

		$data["title"] 		= __("dealer.update");
		$data["dealer"] 	= $dealer;

		return $data;
	}

	public function update( $user, $dealer, $request ) {

		$meta["phone"] 		= $request->phone;
		$meta["email"] 		= $request->email;
		$meta["address"] 	= $request->address;

		$dealer->updateMeta("dealer", $meta);

		Alert::prefix("system")->success(__("update.successfull"));

		return back();
	}

	public function editLogo( $user, $dealer ) {

		$data["title"] 		= __("update.logo");
		$data["dealer"] 	= $dealer;

		return $data;
	}

	public function updateLogo( $user, $dealer, $request ) {

		if( $request->hasFile("logo") ) {

			$name = "logo.".$request->logo->getClientOriginalExtension();
			$path = "__uploads/images/dealers/$dealer->slug";
			$meta["logo"]	= $path."/".$name;

			$request->logo->move(__path($path), $name);

			$dealer->updateMeta("dealer", $meta);

			Alert::prefix("system")->success(__("update.successfull"));

			return redirect("seller");
		}	

		Alert::prefix("system")->danger(__("update.error"));

		return back();
	}

	public function delete($org) {
		if( $org->delete() ) {
			Alert::prefix("system")->success(__("delete.org"));
			return back();
		}

		Alert::prefix("system")->danger(__("delete.error"));

		return back();
	}
}

/* End of providers DealerSupport.php */