<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

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
    public function boot(UrlGenerator $url)
    {
        // https://blog.petehouston.com/2017/08/31/force-http-or-https-scheme-on-laravel-automatically/
        if(env('REDIRECT_HTTPS')) {
            //$url->forceScheme('https');
        }

        \Carbon\Carbon::setLocale('pt_BR');
    }
}
