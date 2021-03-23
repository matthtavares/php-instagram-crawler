<?php

namespace MatthTavares\Instagram\Model;

use JsonSerializable;

class Dimension implements JsonSerializable
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @param int $width
     * @param int $height
     */
    public function __construct( int $width, int $height )
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'width'  => $this->width,
            'height' => $this->height,
        ];
    }
}
