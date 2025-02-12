<?php

namespace App\Providers;


use App;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App as FacadesApp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        Debugbar::enable();
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });

Cache::forget('topUsers');

        $topUsers = Cache::remember('topUsers', now()->addMinutes(5), function () {
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->limit(10)->get();
        });
// similar with php artisan cache:clear
// Cache::flush();

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
