<?php

namespace App\Providers;

use App\Service\Interfaces\SystemInterface;
use App\Service\Interfaces\TaskInterface;
use App\Service\Interfaces\TimesheetInterface;
use App\Service\SystemManagerService;
use App\Service\TaskService;
use App\Service\TimesheetService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Service\Interfaces\StaffInterface;
use  App\Service\StaffService;

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
        $this->app->singleton(StaffInterface::class, StaffService::class);
        $this->app->singleton(SystemInterface::class, SystemManagerService::class);
        $this->app->singleton(TimesheetInterface::class, TimesheetService::class);
        $this->app->singleton(TaskInterface::class, TaskService::class);
    }
}
