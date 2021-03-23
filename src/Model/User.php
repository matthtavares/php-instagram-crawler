<?php

namespace MatthTavares\Instagram\Model;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var type
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var Profile
     */
    private $profile;

    /**
     * @param int     $id
     * @param string  $username
     * @param string  $picture
     * @param Profile $profile
     * @param mixed   $name
     */
    public function __construct(
        int $id,
        string $username,
        string $picture,
        Profile $profile,
        $name = null
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->picture = $picture;
        $this->profile = $profile;
        $this->name = $name;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'       => $this->id,
            'username' => $this->username,
            'name'     => $this->name,
            'profile'  => $this->profile,
            'picture'  => $this->picture,
        ];
    }
}
