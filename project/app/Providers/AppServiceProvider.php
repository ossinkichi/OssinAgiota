<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        Blade::directive('viteOrFallback', function ($expression) {
            return "<?php
            if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))) {
                echo @vite($expression);
            } else {
                echo '<link rel=\"stylesheet\" href=\"' . asset('css/tailwind.css') . '\">';
                echo '<script src=\"' . asset('js/app.js') . '\" defer></script>';
            }
            ?>";
        });
    }
}
