<?php 
namespace Delta\Http\Support\Admin;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/



use Delta\Model\Group;

class UserGroupSupport {

	protected $group;

	public function __construct( Group $group ) {
		$this->group = $group;
	}

	public function getGroups($perpage=10) {
		$data = $this->group->orderBY("id", "DESC");

		return $data->paginate($perpage);
	}

	public function share() {

		return [
			"layout" => "layout-md",
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

	public function index() {

		$data["title"] 		= __("words.groups");
		$data["groups"] 	= $this->getGroups();

		return $data;
	}

	public function create() {

		$data["title"] 		= __("group.new");

		return $data;
	}

	public function getShowGroup($group)
	{
		$data["title"] 		= __("works.group");
		$data["group"]		= $group;

		$data["rol"]		= (function($user) use ($group){
			return $user->groups()->where("slug", $group->slug)->first()->pivot;
		});
		$data['checkbox'] = (function($state){
			$data[0] = '<span class="mdi mdi-checkbox-blank-circle-outline"></span>';
			$data[1] = '<span class="mdi mdi-checkbox-marked-circle-outline"></span>';
			
			return $data[$state];
		});
		
		app("urls")->addTag("urls", [
			"{rol}"   => "admin/users/groups/{s4}",
		]);
		//dd( request()->user()->groups()->where("slug", "admin")->first()->pivot);

		return $data;
	}

	public function toggleUserRol($group, $user, $rol)
	{
		if( ($data = $user->groups()->where("slug", $group->slug))->count() > 0 )
		{
			if( !empty(($pivot = $data->first()->pivot)) )
			{
				$value[0] = 1;
				$value[1] = 0;

				$pivot->{$rol} = $value[$pivot->{$rol}];

				$pivot->save();
			}
		}

		return back();
	}
}

/* End of providers UserGroupSupport.php */