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
        /*
        * User Root
        * Usuario Administrativo */
       	$user = (new User)->create([
        	"fullname" 		=> "Delta Comercial",
        	"publicname" 	=> "Delta",
        	"user"			=> "delta",
        	"email"			=> "delta@webmaster.lc",
        	"password"		=> "admin",
            "activated"     => 1
        ]);

        /* Organization 
        *---------------------------------------------*/
        $group = (new Group)->create([
            "type"      => "organization",
            "slug"      => "admin", 
            "group"     => "Administrador",
            "icon"      => "cog",
            "access"    => 1
        ]);

        $user->orgSync($group->id, [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $group = (new Group)->create([
            "type"      => "organization",
            "slug"      => "profiler", 
            "group"     => "Profiler",
            "icon"      => "account-circle",
            "access"    => 1
        ]);

        $group = (new Group)->create([
            "type"      => "organization",
            "slug"      => "seller", 
            "group"     => "Seller",
            "icon"      => "storefront-outline",
            "access"    => 1
        ]);

        $user->orgSync($group->id, [
            "insert" => 1, "update" => 1, "delete" => 1
        ]);

        $group = (new Group)->create([
            "type"      => "organization",
            "slug"      => "warranty", 
            "group"     => "Warranty",
            "icon"      => "certificate",
            "access"    => 1
        ]);

        $user->orgSync($group->id);
    }

}

/* End of seeds Account.php */