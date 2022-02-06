<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ItemSearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'itemsearch',
            'App\Http\Components\ItemSearch'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
