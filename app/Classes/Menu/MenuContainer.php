<?php
/**
 * Created by PhpStorm.
 * User: jmast
 * Date: 17-Nov-17
 * Time: 18:37
 */

namespace App\Classes\Menu;

class MenuContainer
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $order = 0;

    /**
     * MenuContainer constructor.
     *
     * @param $name
     * @param int $order
     */
    public function __construct($name, $order = 0)
    {
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param $title
     * @param $url
     * @return $this
     */
    public function add($title, $url)
    {
        $this->items[] = new MenuItem($title, $url);

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }
}