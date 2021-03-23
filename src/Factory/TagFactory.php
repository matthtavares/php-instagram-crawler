<?php

namespace MatthTavares\Instagram\Factory;

use MatthTavares\Instagram\Model\Tag;

class TagFactory
{
    /**
     * @param string $name
     * @param int    $count
     *
     * @return Tag
     */
    public static function create( string $name, int $count = 0 ): Tag
    {
        return new Tag($name, $count);
    }
}
