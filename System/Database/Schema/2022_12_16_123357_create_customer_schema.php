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

        Schema::create('customers', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->integer('group_id')->unsigned();
            
            $table->foreign('group_id')->references('id')->on('users_groups')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("niv", 9);
            $table->date("date")->nullable();
            $table->string("customer", 150)->nullable();
            $table->string("rnc", 15)->nullable();

            $table->string("email", 100)->nullable();

            $table->string("phone", 12)->nullable();
            $table->string("cellphone", 12);

            $table->string("code", 20)->nullable();
            $table->string("sector", 200)->nullable();
            $table->string("address", 150)->nullable();

            $table->text("avatar")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('customers');
    }
};
