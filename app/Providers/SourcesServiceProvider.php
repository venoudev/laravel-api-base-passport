<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthServiceImpl;
use App\Services\Contracts\AuthService;

class SourcesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthService::class,AuthServiceImpl::class);
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
