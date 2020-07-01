<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
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
        View::composer(['front-end.partials.header.menu_desktop', 'front-end.partials.footer.footer'], function ($view) {
            $main_menu = Menu::where('title', 'main_menu')->first();
            if ($main_menu == null) {
                abort(404);
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

    }
}