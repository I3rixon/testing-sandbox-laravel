<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HelloService;
use App\Facades\Hello;
use Illuminate\Foundation\AliasLoader;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('hello', function ($app) {
            return new HelloService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        AliasLoader::getInstance()->alias('Hello', Hello::class);
    }
}
