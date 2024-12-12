<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Model\Subject;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function(  $user){
            return $user->userCategory == 'admin';
        });

        Gate::define('isStudent', function($user){
            return $user->userCategory == 'student';
        });

        Gate::define('isLecturer', function($user){
            return $user->userCategory == 'lecturer';
        });
    }

    protected $policies = [
        Subject::class => SubjectPolicy::class,
    ];
}
