<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name', 100)->nullable()->default('Laraschool');
            $table->string('email', 100)->nullable()->default('admin@laraschool.com');
            $table->string('phone', 100)->nullable()->default('');
            $table->string('address', 100)->nullable();

            $table->string('logo')->nullable()->default('logo.png');
            $table->string('letterhead', 100)->nullable()->default('letterhead.png');

            $table->unsignedInteger('sms_provider_id')->nullable();

            $table->string('mail_mailer', 100)->nullable()->default('smtp');
            $table->string('mail_host', 100)->nullable()->default('smtp.mailtrap.io');
            $table->string('mail_port', 100)->nullable()->default('2525');
            $table->string('mail_username', 100)->nullable();
            $table->string('mail_password', 100)->nullable();
            $table->string('mail_encryption', 100)->nullable()->default('ssl');
            $table->string('mail_from_address', 100)->nullable()->default('admin@laraschool.com');
            $table->string('mail_from_name', 100)->nullable()->default('Laraschool');
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
        Schema::dropIfExists('settings');
    }
}
