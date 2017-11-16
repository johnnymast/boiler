<?php

namespace App\Classes;

class SystemMenu
{
    private $items = [];

    /**
     * @param $title
     * @param $url
     * @return \App\Classes\SystemMenu
     */
    public function prepend($title, $url)
    {
        array_unshift($this->items, [
            'title' => $title,
            'url' => $url,
        ]);

        return $this;
    }

    /**
     * @param $title
     * @param $url
     * @return \App\Classes\SystemMenu
     */
    public function prependItems($items = [])
    {

        if (is_array($items)) {
            $items = array_reverse($items);
            foreach ($items as $item) {
                array_unshift($this->items, [
                    'title' => $item['title'],
                    'url' => $item['url'],
                ]);
            }
        }

        return $this;
    }


    /**
     * @param $title
     * @param $url
     * @return \App\Classes\SystemMenu
     */
    public function add($title, $url)
    {
        $this->items[] = [
            'title' => $title,
            'url' => $url,
        ];
        return $this;
    }

    public function toArray() {
        return $this->items;
    }
}