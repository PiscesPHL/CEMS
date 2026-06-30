<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Add this
use App\Models\User;                 // <-- Add this

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
        // Define the Gate from your slide
        Gate::define('manage-students', function (User $user) {
            return $user->isAdmin(); 
        });
    }
}