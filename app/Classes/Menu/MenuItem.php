<?php

namespace App\Classes\Menu;

use Illuminate\Support\Facades\Request;

class MenuItem
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $url = '';

    /**
     * @var bool
     */
    protected $active = false;

    /**
     * @return bool
     */
    public function isActive()
    {
        return (Request::url() == $this->getUrl());
    }
    
    /**
     * MenuItem constructor.
     *
     * @param string $title
     * @param string $url
     */
    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MenuItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return MenuItem
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}