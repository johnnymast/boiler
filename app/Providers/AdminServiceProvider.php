<?php

namespace App\Providers;

use App\Facades\SystemMenu;
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
        SystemMenu::add('Users', route('users.index'))
            ->add('Logout', url('logout'));

        View::composer('*', function($view)
        {
            $view->with('sidemenu', SystemMenu::toArray());
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
