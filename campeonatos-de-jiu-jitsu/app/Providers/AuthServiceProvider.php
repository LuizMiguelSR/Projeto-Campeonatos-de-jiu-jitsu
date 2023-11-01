<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

    }
    
    protected function registerCustomUserProvider()
{
    $this->app->bind('auth.atleta', function ($app, array $config) {
        return new AtletaUserProvider($app->make('hash'), $config['model']);
    });
}
}
