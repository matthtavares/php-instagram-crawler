<?php

namespace MatthTavares\Instagram\Model;

use JsonSerializable;

class Tag implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * @param string $name
     * @param int    $count
     */
    public function __construct( string $name, int $count = 0 )
    {
        $this->name = $name;
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'name'  => $this->name,
            'count' => $this->count,
        ];
    }
}
