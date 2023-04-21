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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string("type", 50)->default("api");
            $table->bigInteger("user_id")->default(0);
            $table->string("description", 80)->nullable();
            $table->text('comment')->nullable();
            $table->enum('method',["GET", "POST","ANY"])->default("GET");
            $table->string('path', 100);
            $table->string('token', 200)->unique();
            $table->text('hash');
            $table->string('controller');
            $table->boolean("state")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('apps');
    }
};
