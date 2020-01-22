<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // $gate->define('Superadmin', function($user){
        //     return $user->user_type == 'superadmin';
        // });
        // $gate->define('IsAdmin', function($user){
        //     return $user->user_type == 'admin';
        // });
        // $gate->define('IsUser', function($user){
        //     return $user->user_type == 'user';
        // });
    }
}
