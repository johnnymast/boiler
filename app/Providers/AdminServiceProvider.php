<?php

namespace App\Providers;

use App\Classes\Menu\MenuItem;
use App\Facades\Menu;
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
        //Menu::add('Users', route('users.index'))
        //    ->add('Logout', url('logout'));

        Menu::make('package');
        Menu::make('system', 1)
            ->add('Users', route('users.index'))
            ->add('Logout', url('logout'));

        View::composer('*', function($view)
        {
            $view->with('sidemenus', Menu::getMenus());
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
