<?php

namespace App\Providers;

use App\Repository\DepartmentRepository;
use App\Repository\Interface\IDepartmentRepository;
use App\Repository\Interface\IUserRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IDepartmentRepository::class, DepartmentRepository::class);
        $this->app->singleton(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
