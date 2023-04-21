<?php 
namespace Delta\Http\Controllers\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;

class Home {

	protected $user;

	protected $file;

	public function __construct( User $user, Filesystem $file ) {
		$this->user = $user;
		$this->file = $file;
	}

	public function portada(  ) {

		$data["title"] = "Instalador";



		return $data;
	}

	public function confirmTerm() {

		\Artisan::call("vendor:publish", [
			"--tag" => "lighter", "--force" => true
		]);

		return redirect("install/env");
	}

	public function env() {

		$data["title"] = "Ambiente Laravel";
		$data["env"] = $this->file->get(base_path(".env"));

		return $data;
	}

	public function envUpdate($request) {
		
		$this->file->put(base_path(".env"), $request->env);
		return back();
	}

	public function database() {

		$data["title"] = "Basedatos";

		return $data;
	}

	public function forge( $opt ) {

		$path = str_replace(base_path(), null, __DEALER__."/System/Database");

		if( $opt == "create" ) {
			if( Schema::hasTable("users") ) {
				\Artisan::call("migrate:reset", ["--path" => $path."/Schema"]);	
			}
			\Artisan::call("migrate", ["--path" => $path."/Schema"]);
			\Artisan::call("db:seed", [
				"--class" => \Delta\Database\Seeds\Account::class
			]);
			\Artisan::call("db:seed", [
				"--class" => \Delta\Database\Seeds\Zona::class
			]);			
		}

		if( $opt == "refresh" ) {
			\Artisan::call("migrate:reset", ["--path" => $path."/Schema"]);	
			\Artisan::call("migrate", ["--path" => $path."/Schema"]);	

			\Artisan::call("db:seed", [
				"--class" => \Delta\Database\Seeds\Account::class
			]);
			\Artisan::call("db:seed", [
				"--class" => \Delta\Database\Seeds\Zona::class
			]);
		}

		if( $opt == "reset" ) {
			\Artisan::call("migrate:reset", ["--path" => $path."/Schema"]);		
		}

		return redirect("install/database");
	}

	public function updateEnv( $key=null, $value=null ) {

		if( !empty($key) && !empty($value) ) {

			$envs = $this->file->get(base_path(".env"));
			$envs = explode("\r\n", $envs);

			foreach($envs as $k => $v) {
				if( preg_match('/^'.$key.'/', $v) ) {
					$envs[$k] = "$key=$value";
				}
			}

			$env = implode("\r\n", $envs);

			if( is_string($env) ) {
				$this->file->put(base_path(".env"), $env);
			}		
		}
	}

	public function updatePassword($pwd) {

		$user = $this->user->where("user", "delta")->first();
		$user->password = $pwd;

		return $user->save();
	}
	public function close( $request ) {

		if( $this->updatePassword($request->pwd) ) {
			
			$this->updateEnv("APP_STATE", "true");

			return redirect("/");
		}

		return back();
	}

}

/* End of providers Home.php */