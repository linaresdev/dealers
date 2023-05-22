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

        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string("fullname")->default("Owner");
            $table->string("publicname")->default("Public Name");
            $table->string("rnc", 30)->unique()->nullable();
            $table->string("user", 30)->unique();
            $table->string("email", 100)->unique();
            $table->string("cellphone", 20)->nullable();
            $table->string("password", 80);
            $table->text("hashed")->nullable();
            $table->boolean("password_check")->default(0);
            $table->string("avatar", 200)->default(":avatar_path/user.png");
            $table->string("type", 30)->default("local");

            $table->char("activated", 1)->default(0);

            $table->rememberToken();

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('users_reset', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('type', 50)->default("retrieve");
            $table->string('email', 130)->index();
            $table->string('token', 100);

            $table->timestamp('expired');

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('users_meta', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("type", 30)->default("info");

            $table->string('key', 255);
            $table->text('value')->nullable();

            $table->boolean('activated')->default(1);

            $table->engine = 'InnoDB';
        });

        Schema::create('users_session', function ( Blueprint $table ) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id')->default(0);

            $table->string("type")->default("news");
            $table->string("guard", 30)->default("web");
            $table->string("token", 75)->nullable();

            $table->string("host", 45)->nullable();
            $table->text("httphost")->nullable();
            $table->text("url")->nullable();

            $table->text("agent")->nullable();

            $table->char("activated", 1)->default(1);
            $table->text("action")->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users_session');
        Schema::dropIfExists('users_reset');
        Schema::dropIfExists('users_meta');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('users');
    }
};
