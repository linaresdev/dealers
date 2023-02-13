<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Group;

class OrganizationSupport {

	protected $group;

	protected $user;

	public function __construct( User $user, Group $group ) {
		$this->user = $user;
		$this->group = $group;
	}

	public function share() {
		return [
			"layout"	=> "layout-md",
			"hasError" => function($name) {
				if( session()->has("errors") ) {
					$errors = session()->get("errors");

					return $errors->first(
						$name, 
						'<p class="error"> :message </p>'
					);
				}
			}
		];
	}

	public function ajaxUsers($org, $src) {
		$data["users"] = $this->user->where("fullname", "LIKE", '%'.$src.'%')->get();

		return $data;
	}

	public function getUser( $name ) {
		return $this->user->where("fullname", $name)->first() ?? null;
	}

	public function getRols($parent) {
		return $this->group->where("parent", $parent)->get();
	}

	public function getWorkGroup($group) {
		return $this->group->where("parent", $group->id)->get();
	}

	public function index( $org ) {

		$data["title"] 	= __("words.".$org->slug);
		$data["brand"] 	= "mdi-".$org->icon;
		$data["org"] 	=	$org;

		$data["rols"]	= $this->getRols($org->id);

		return $data;
	}

	public function create( $org, $request ) {

		$this->group->create([
			"parent" 	=> $org->id,
			"group" 	=> $request->group,
			"slug" 		=> \Str::slug($request->group),
			"icon"		=> "shield-key"
		])->addMeta("info", [
			"description" => $request->description
		]);

		return back();
	}

	public function editRol($org, $rol) {

		$data["title"] 	= __("words.".$org->slug);
		$data["brand"] 	= "mdi-".$org->icon;
		$data["org"]	= $org;
		$data["rol"]	= $rol;

		return $data;
	}

	public function updateRol($org, $rol, $request) {

		$rol->group = $request->group;
		$rol->slug 	= \Str::slug($request->group);
		$rol->icon	= "shield-key";

		if($rol->save()) {

			$rol->updateMeta("info", [
				"description" => $request->description
			]);

			return redirect()->to(__url("__entity"));
		}

		return back();
	}

	public function delete( $org, $ID ) {
		$this->group->find($ID)->delete();

		return back();
	}

	public function group( $org, $group ) {

		app("urls")->addTag("urls", [
			"__toggle" => "__now/toggle"
		]);

		$data["title"] 	= __("words.".$org->slug);
		$data["brand"] 	= "mdi-".$org->icon;
		$data["org"] 	= $org;
		$data["group"] 	= $group;

		$data["rol"]	= function($user) use ($group) {
			return $user->rol($group->slug);
		};

		$data["checkbox"] = function($state) {
			if($state) {
				return __mdi('checkbox-intermediate');
			}
			else {
				return __mdi('checkbox-blank-outline');
			}
		};

		return $data;
	}

	public function userDetach( $org, $group, $ID ) {
		$group->users()->detach($ID); return back();
	}

	public function userToggleRol( $org, $group, $ID, $rol) {

		$userRol = $this->user->find($ID)->rol($group->slug);

		if( $userRol->{$rol} ) {
			$group->users()->updateExistingPivot($ID, [$rol => 0]);
		}
		else {
			$group->users()->updateExistingPivot($ID, [$rol => 1]);
		}

		return back();
	}

	public function users( $org ) {
		$data["title"] 	= __("words.".$org->slug);
		$data["brand"] 	= "mdi-".$org->icon;
		$data["org"] 	=	$org;
		$data["wgroups"] = $this->getWorkGroup($org);

		return $data;
	}

	public function searchUsers($org, $src) {
		$data["users"] = $this->user->where("fullname", "LIKE", '%'.$src.'%')->get();

		return $data;
	}

	public function addUserGroup( $org, $group, $request ) {

		if( !empty( ($user = $this->getUser($request->src)) ) ) {
			$group->syncUser([$user->id => ["view" => 1, "insert" => 1]]);
		}

		return back();
	}
}