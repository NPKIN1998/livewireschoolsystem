<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();

        Gate::define('manage-users', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('create-school', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('create-course', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('create-unit', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('manage-courses', function (User $user) {
            return $user->role_id == 3;
        });
    }
}
