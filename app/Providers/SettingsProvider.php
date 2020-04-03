<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings;

class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $settings = Settings::first();

        if ($settings !== null) {
            # code...
            config(['app.name' => $settings->app_name]);
            config(['app.email' => $settings->email]);
            config(['app.phone' => $settings->phone]);
            config(['app.address' => $settings->address]);

            config(['mail.mail_mailer' => $settings->mail_mailer]);
            config(['mail.mail_host' => $settings->mail_host]);
            config(['mail.mail_port' => $settings->mail_port]);
            config(['mail.mail_username' => $settings->mail_username]);
            config(['mail.mail_password' => $settings->mail_password]);
            config(['mail.mail_encryption' => $settings->mail_encryption]);
            config(['mail.mail_from_address' => $settings->mail_from_address]);
            config(['mail.mail_from_name' => $settings->mail_from_name]);

        }
    }
}
