<?php

namespace MatthTavares\Instagram\Model;

use JsonSerializable;

class Profile implements JsonSerializable
{
    /**
     * @var string
     */
    private $biography;

    /**
     * @var string
     */
    private $website;

    /**
     * @var bool
     */
    private $privated = false;

    /**
     * @var bool
     */
    private $verified;

    /**
     * @var int
     */
    private $followers = 0;

    /**
     * @var int
     */
    private $follows = 0;

    /**
     * @var int
     */
    private $media = 0;

    /**
     * @param bool  $privated
     * @param mixed $verified
     * @param mixed $biography
     * @param mixed $website
     */
    public function __construct(
        bool $privated = false,
        $verified = null,
        $biography = null,
        $website = null,
        $followers = 0,
        $follows = 0,
        $media = 0
    ) {
        $this->privated = $privated;
        $this->verified = $verified;
        $this->biography = $biography;
        $this->website = $website;
        $this->followers = $followers;
        $this->follows = $follows;
        $this->media = $media;
    }

    /**
     * @throws \UnexpectedValueException
     *
     * @return bool
     */
    public function isPrivated(): bool
    {
        if (!is_bool($this->privated)) {
            throw new \UnexpectedValueException('Can´t check if profile is privated.');
        }
        
        return $this->privated;
    }

    /**
     * @throws \UnexpectedValueException
     *
     * @return bool
     */
    public function isVerified(): bool
    {
        if (!is_bool($this->verified)) {
            throw new \UnexpectedValueException('Can´t check if profile is verified.');
        }

        return $this->verified;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return int
     */
    public function getFollowersCount(): int
    {
        return $this->followers;
    }

    /**
     * @return int
     */
    public function getFollowsCount(): int
    {
        return $this->follows;
    }

    /**
     * @return int
     */
    public function getMediaCount(): int
    {
        return $this->media;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'is_privated' => $this->privated,
            'is_verified' => $this->verified,
            'biography'   => $this->biography,
            'website'     => $this->website,
            'followers'   => $this->followers,
            'follows'     => $this->follows,
            'media'       => $this->media,
        ];
    }
}
