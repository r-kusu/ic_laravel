<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 0c86bbae8f4bc114bef945404c904b1653dc3532
