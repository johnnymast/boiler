<?php
namespace App\Facades;

use Lavary\Menu\Facade;

class SystemMenu extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'system_menu'; }
}