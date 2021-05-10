<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
    public function boot()
    {
        Inertia::share([
            'locale' => function() {
                return app()->getLocale();
            },
            'availableLocales' => function() {
                return config('app.available_locales');
            },
            'language' => function() {
                return translations(resource_path('lang/' . app()->getLocale() . '.json'));
            }
        ]);
    }
}
