<?php

namespace App\Providers;

use App\Service\Interfaces\SystemInterface;
use App\Service\Systemmanager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Service\Interfaces\StaffInterface;
use  App\Service\Staff;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton(StaffInterface::class, Staff::class);
        $this->app->singleton(SystemInterface::class, Systemmanager::class);
    }
}
