<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $gate->define('update-products', function($user) {
            return $user->isAdmin();
        });

        $gate->define('update-users', function($user) {
            return $user->isSuperAdmin();
        });

        View::composer('*', function ($view) {
            $settings = DB::table('settings')->pluck('value', 'key');
            $categories = DB::table('categories')->get();

            $view->with('settings', $settings);
            $view->with('categories', $categories);
        });

        if (!function_exists('getCategoryIcon')) {
            function getCategoryIcon($categoryName)
            {
                switch ($categoryName) {
                    case 'سلل غذائية':
                        return 'fas fa-wheat-awn-circle-exclamation';
                    case 'كفالة ايتام':
                        return 'fas fa-child';
                    case 'زكاة الفطر':
                        return 'fas fa-hand-holding-heart';
                    case 'زكاة المال':
                        return 'fas fa-coins';
                    default:
                        return 'fas fa-tag';
                }
            }
        }
    }
}
