<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidgetNick
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('initials', ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof'])->nullable()->default(null);
            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('id_number')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('confirmed')->nullable()->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable()->default('profile.png');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'first' => 'Sys',
            'last' => 'Admin',
            'email' => 'admin@laraschool.com',
            'confirmed' => true,
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password3700'),
        ]);
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
