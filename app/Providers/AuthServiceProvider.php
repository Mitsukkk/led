<?php

namespace App\Providers;

use App\User;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            $apiToken = $request->bearerToken();

            if ($apiToken === null) {
                $apiToken = $request->input('api_token');
            }

            if ($apiToken && $apiToken == env('API_TOKEN')) {
                return new GenericUser(['id' => 1, 'name' => 'User']);
            } else {
                return null;
            }
        });
    }
}
