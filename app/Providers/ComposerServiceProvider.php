<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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

        //Theme Option
        View::composer(['front-end.partials.footer.footer'], function ($view) {
            $data = ThemeOptions::where('key','social')->first();
            if($data == null) abort(404);
            $content = json_decode($data->value);
            $view->with(['themeOption'=>$content]);
        });

        //Theme Option header
        View::composer(['front-end.partials.header.*'], function ($view) {
            $data = ThemeOptions::where('key','header')->first();
            if($data == null) abort(404);
            $content = json_decode($data->value);
            $view->with(['themeOptionHeader'=>$content]);
        });
    }
}