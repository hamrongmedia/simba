<?php

namespace App\Providers;

use App\Models\ThemeOptions;
use Illuminate\Support\Facades\View;
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

        //Theme Option Social
        View::composer(['front-end.partials.footer.footer'], function ($view) {
            $data = ThemeOptions::where('key', 'social')->first();
            if ($data == null) {
                return;
            }

            $content = json_decode($data->value);
            $view->with(['themeOptionSocial' => $content]);
        });

        //Theme Option header
        View::composer(['front-end.partials.header.*', 'front-end.partials.footer.footer', 'front-end.checkout.*'], function ($view) {
            $data = ThemeOptions::where('key', 'header')->first();
            if ($data == null) {
                return;
            }

            $content = json_decode($data->value);
            $view->with(['themeOptionHeader' => $content]);
        });

        //Theme Option Footer
        View::composer(['front-end.partials.footer.footer'], function ($view) {
            $data = ThemeOptions::where('key', 'footer')->first();
            if ($data == null) {
                return;
            }

            $content = json_decode($data->value);
            $view->with(['themeOptionFooter' => $content]);
        });

        //Theme Option Script
        View::composer(['front-end.partials.footer.*', 'front-end.partials.header.*', 'front-end.checkout.*'], function ($view) {
            $data = ThemeOptions::where('key', 'script')->first();
            if ($data == null) {
                return;
            }

            $content = json_decode($data->value);
            $view->with(['themeOptionScript' => $content]);
        });
    }
}