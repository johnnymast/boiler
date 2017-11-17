<?php

namespace App\Classes\Menu;

class Builder
{
    /**
     * @var array
     */
    private $menus = [];

    public function make($name = '', $order = 0) {
        if (!isset($this->menus[$name])) {
            $this->menus[$name] = new MenuContainer($name, $order);
        }
        return $this->menus[$name];
    }

    public function getMenus() {
        usort ( $this->menus , function($menu1, $menu2) {
            return ($menu1->getOrder() > $menu2->getOrder());
        });
        return $this->menus;
    }
}