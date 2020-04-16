<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('initials', ['Mr', 'Mrs', 'Miss'])->nullable()->default(null);
            $table->string('first');
            $table->string('last');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('id_number')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('confirmed')->nullable()->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
