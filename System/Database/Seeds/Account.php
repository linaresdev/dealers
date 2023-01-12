<?php
namespace Delta\Database\Seeds;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Delta\Model\User;
use Delta\Model\Group;
use Illuminate\Database\Seeder;

class Account extends Seeder {

	public function run() {

		(new Group)->create(["slug" => "admin", "group" => "Administrador"]);
		(new Group)->create(["slug" => "supervisor", "group" => "Supervisor"]);
		(new Group)->create(["slug" => "user", "group" => "Usuario"]);

        ## DEALERS
        (new Group)->create([
            "slug" => "dealers", "group" => "Dealers"
        ]);

        (new Group)->create([
            "parent"=>"dealers", "slug" => "autohaus", "group" => "Autohaus"
        ])->addMeta("info", [
            "email"     => "info@autohaus.com.do",
            "phone"     => "809 334 4111",
            "address"   => "Ave. John F. Kennedy, Esq. Gracita Alvarez, Santo Domingo, Rep. Dominicana."
        ]);


       	$user = (new User)->create([
        	"fullname" 		=> "Web Master",
        	"publicname" 	=> "Admin",
        	"user"			=> "admin",
        	"email"			=> "admin@webmaster.lc",
        	"password"		=> "admin"
        ]);

        $user->syncGroup("admin", [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);
        $user->syncGroup("user", [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $user->syncGroup("dealers", [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $user->syncGroup("autohaus", [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);
    }

}

/* End of seeds Account.php */