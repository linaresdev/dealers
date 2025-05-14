<?php 
namespace Delta\Http\Support\Warranty;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\Zona;
use Delta\Model\Customer;
use Delta\Model\UserSession;
use Delta\Alert\Facade\Alert;
use Illuminate\Support\Facades\Cache;

class WarrantySupport {

	protected $customer;

	protected $warrantyCount = 0;

	public function __construct( Customer $customer ) {	
		$this->customer = $customer;
	}

	public function share() {
		return [
			"layout"	=> "layout-sm"
		];
	}

	public function index( $user ) {
		$data["title"] 	= __( "words.warranty" );

		$data["user"]	= $user;

		return $data;
	}

	public function search($org, $src, $userID, $path ) {
		
		$data = $this->customer
				->where("group_id", $org->id)
				->where($this->filterBy(), "LIKE", '%'.$src.'%')->get();
		
		return view($path."search", ["warranties" => $data]);
	}

	public function filterBy() {
		if( Cache::has("warranty.search.with") ) {
			return Cache::get("warranty.search.with");
		}

		return "niv";
	}

	public function setFilter($org, $filter=null) {
		if( !empty($filter) ) {
			Cache::forget("warranty.search.with");
			Cache::forever("warranty.search.with", $filter);
		}
		
		return back();
	}

	public function home( $org ) {
		
		//dd($this->filterBy());


		$data["title"] 			= $org->group;
		$data["org"] 			= $org;
		
		$data["warranties"] 	= $this->getWarranty($org->id,5);
		$data["warrantyCount"]	= $this->warrantyCount;
		$data["filter"] 		= $this->filterBy();

		return $data;
	}

	public function activate($org, $warranty) {

		$warranty->state = 1;

		if( $warranty->save() ) {
			(new UserSession)->news("jobs", [
				"status" 	=> 202,
				"action"	=> __("words.update"),
				"subject"	=> __("news.update.warranty", ["warranty" => $org->group]),
				"registro"	=> $org->id,
				"author"		=> $warranty->user_id, 
				"path"		=> request()->path(),
			]);
		}

		return back();
	}

	public function show($org, $warranty) {

		$data["title"] 		= __("words.warranty");
		$data["org"]		= $org;
		$data["warranty"] 	= $org->customer->where("id", $warranty)->first() ?? abort(404);

		return $data;
	}

	public function getWarranty($ID, $take) 
	{
		$data = $this->customer
					->where("group_id", $ID)
					->orderBY("id", "DESC");

		if( ($this->warrantyCount = $data->count()) > 0 )
		{
			return $data->take($take)->get();
		}
	}

	public function addWarranty( $org ) {

		$data["title"] 		= __("warranty.form");
		$data["org"] 		= $org;

		$data["isError"]	= (function($field){
			if( session()->has("errors") ) {
				if(!empty( session()->get("errors")->first($field) ) ) {
					return ' is-invalid';					
				}
			}
		});

		return $data;
	}

	public function getCodeFromDescription($description) {
		return (new Zona)->where("description", $description)->first()->code;
	}

	public function filterFieldRNC($value) {
		$value = trim($value);
		$value = str_replace('-', null, $value);
		$value = str_replace(' ', null, $value);

		return $value;
	}

	public function filterFieldPhone($value) {		
		$value = trim($value);
		$value = str_replace('-', null, $value);
		$value = str_replace(' ', null, $value);

		return $value;
	}

	public function saveWarranty( $org, $request, $user ) {

		$this->customer->date 		= $request->date;
		$this->customer->group_id 	= $org->id;
		$this->customer->user_id 	= $user->id;
		$this->customer->niv 		= $request->niv;
		$this->customer->customer 	= $request->customer;
		$this->customer->rnc 		= $this->filterFieldRNC($request->rnc);
		$this->customer->email 		= $request->email;
		$this->customer->cellphone 	= $this->filterFieldPhone($request->cellphone);
		$this->customer->niv 		= $request->niv;
		$this->customer->address 	= $request->address;
		$this->customer->code 		= $this->getCodeFromDescription($request->sector);
		$this->customer->sector 	= $request->sector;
		
		if($this->customer->save()) {

			(new UserSession)->news("jobs", [
				"status" 	=> 201,
				"action"	=> "Create",
				"subject"	=> __("news.create.org", ["org" => $org->group]),
				"registro"	=> $org->id,
				"user"		=> $user->id, 
				"path"		=> request()->path(),
			]);

			return redirect(__url("warranty/__s2"));
		}

		return back();
	}

	public function srcZone($org, $src) {

		$data["locations"] = (new Zona)->where(
			"description", "LIKE", '%'.$src.'%'
		)->take(6)->get();

		return $data;
	}

	public function delete( $org, $warranty ) {
			
		if( ($warranty->state == 0) OR ($warranty->state == 3) ) {

			$ID 	= $warranty->id;
			$UID 	= $warranty->user_id;

			if( $warranty->delete() ) {
				(new UserSession)->news("jobs", [
					"status" 	=> 202,
					"action"	=> __("words.delete"),
					"subject"	=> __("news.delete.warranty", ["warranty" => $org->group]),
					"registro"	=> $org->id,
					"author"		=> $UID, 
					"path"		=> request()->path(),
				]);				
			}
		}

		return back();
	}
}

/* End of Controller HomeSupport.php */