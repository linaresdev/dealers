<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('users_groups', function (Blueprint $table) {

            $table->increments('id');

            $table->integer("parent")->default(0);

            $table->string("slug", 100);

            $table->text("group")->nullable();

            $table->boolean("activated")->default(1);

            $table->engine = 'InnoDB';
        });         

        Schema::create('users_groups_pivots', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('users_groups')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->boolean("view")->default(1);
            $table->boolean("insert")->default(0);
            $table->boolean("update")->default(0);
            $table->boolean("delete")->default(0);

            $table->engine = 'InnoDB';
        });

        Schema::create( 'users_groups_metas', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('users_groups')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("type", 30)->default("info");

            $table->string("slug")->nullable();
            $table->text("value")->nullable();

            $table->engine = 'InnoDB';
        }); 
          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users_groups_pivots');
        Schema::dropIfExists('users_groups_metas');
        Schema::dropIfExists('users_groups');
    }
};
