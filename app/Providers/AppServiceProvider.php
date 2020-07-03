<?php

namespace App\Providers;

use App\Models\MailConfig;
use Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $mail = MailConfig::first();
        if (isset($mail)) {
            Config::set([
                'mail.mailers.smtp.transpot' => 'smtp',
                'mail.mailers.smtp.host' => $mail->mail_smpt_host,
                'mail.mailers.smtp.port' => $mail->mail_port,
                'mail.mailers.smtp.encryption' => $mail->mail_encryption,
                'mail.mailers.smtp.username' => $mail->mail_username,
                'mail.mailers.smtp.password' => $mail->mail_password,
            ]);
        }

    }
}