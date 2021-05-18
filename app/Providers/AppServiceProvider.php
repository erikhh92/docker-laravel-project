<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

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


        Storage::extend('dropbox', function ($app, $config) {

            $client = new DropboxClient($config['authorization_token']);
            $adapter = new DropboxAdapter($client);
            return  new Filesystem($adapter, ['case_sensitive' => false]);

        });


    }
}