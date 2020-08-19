<?php

namespace App\Providers;

use App\Models\MailConfig;
use App\Models\Menu;
use Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;
use App\Services\CartService;
class ViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['front-end.partials.header.menu_desktop', 'front-end.partials.header.menu_mobile' ,'front-end.partials.footer.footer'], function ($view) {
            $main_menu = Menu::where('title', 'main_menu')->first();
            if ($main_menu == null) {
                return;
            }

            $view->with(['main_menu' => $main_menu]);
        });

        View::composer(['front-end.partials.footer.footer'], function ($view) {
            $bottom_menu = Menu::where('title', 'bottom_menu')->first();
            if ($bottom_menu == null) {
                return;
            }

            $view->with(['bottom_menu' => $bottom_menu]);
        });

        view()->composer('front-end.partials.header.header', function($view)
        {
            $total_item_cart = CartService::getTotalQuantityCart();
            View::share('total_item_cart', $total_item_cart);
        });

        // View::composer('*', function($view)
        // {
        //     if (Auth::check()) {
        //         $total_item_cart = CartService::getTotalQuantityCart();
        //         View::share('total_item_cart', $total_item_cart);
        //     }
        // });
        /*
        if (Schema::hasTable('mail_config')) {
            $this->mail = MailConfig::first();
            if (isset($this->mail)) {
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
        */

    }
}