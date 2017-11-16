<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            $view->with('sidemenu',config('admin.sidemenu'));
        });

        \Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4");
        \Illuminate\Pagination\AbstractPaginator::defaultSimpleView("pagination::simple-bootstrap-4");

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
