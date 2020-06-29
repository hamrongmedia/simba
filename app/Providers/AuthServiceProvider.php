<?php

namespace App\Providers;

use App\Models\Posts;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Posts::class => PostPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-admin', function ($user) {
            return in_array('create-admin', $user->getActions());
        });

        Gate::define('view-admin', function ($user) {
            return in_array('view-admin', $user->getActions());
        });

        //
    }
}