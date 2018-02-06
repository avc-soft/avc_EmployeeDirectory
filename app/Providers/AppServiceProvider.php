<?php

namespace App\Providers;

use App\Employee;
use App\Observers\EmployeeObserver;
use App\Position;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Employee::observe(EmployeeObserver::class);

        \View::composer('employees.crud._form', function ($view) {
            $view->with('positions', Position::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
