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
        View::composer('front-end.partials.header.menu_desktop', function ($view) {
            $main_menu = Menu::where('name', 'main_menu')->first();
            if ($main_menu == null) {
                abort(404);
            }

            $view->with(['main_menu' => $main_menu]);
        });
    }
}