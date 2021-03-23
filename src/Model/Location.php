<?php

namespace MatthTavares\Instagram\Model;

use JsonSerializable;

class Location implements JsonSerializable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var Coordinate
     */
    public $coordinate;

    /**
     * @param int        $id
     * @param string     $name
     * @param string     $slug
     * @param Coordinate $coordinate
     */
    public function __construct(
        int $id,
        string $name,
        string $slug,
        Coordinate $coordinate = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->coordinate = $coordinate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return bool
     */
    public function hasCoordinate(): bool
    {
        return $this->coordinate instanceof Coordinate;
    }

    /**
     * @return mixed
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'has_coordinate' => $this->hasCoordinate(),
            'coordinate'     => $this->coordinate,
        ];
    }
}
