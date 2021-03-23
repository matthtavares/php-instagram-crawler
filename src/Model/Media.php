<?php

namespace MatthTavares\Instagram\Model;

use DateTime;
use JsonSerializable;

abstract class Media implements JsonSerializable
{
    const PHOTO_TYPE = 'photo';
    const VIDEO_TYPE = 'video';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $caption;

    /**
     * @var string
     */
    private $code;

    /**
     * @var DateTime
     */
    private $created;

    /**
     * @var Profile
     */
    private $user;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Dimension
     */
    protected $dimension;

    /**
     * @var int
     */
    protected $likes = 0;

    /**
     * @var int
     */
    protected $comments = 0;

    /**
     * @var bool
     */
    private $ad = false;

    /**
     * @var Location
     */
    private $location = null;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @param int       $id
     * @param string    $code
     * @param string    $url
     * @param Dimension $dimension
     * @param DateTime  $created
     * @param User      $user
     * @param array     $tags
     * @param int       $likes
     * @param int       $comments
     * @param bool      $ad
     * @param mixed     $caption
     * @param Location  $location
     */
    public function __construct(
        int $id,
        string $code,
        string $url,
        Dimension $dimension,
        DateTime $created,
        User $user,
        array $tags = [],
        int $likes = 0,
        int $comments = 0,
        bool $ad = false,
        $caption = null,
        Location $location = null
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->url = $url;
        $this->dimension = $dimension;
        $this->created = $created;
        $this->user = $user;
        $this->tags = $tags;
        $this->likes = $likes;
        $this->comments = $comments;
        $this->ad = $ad;
        $this->caption = $caption;
        $this->location = $location;
    }

    /**
     * @throws \UnexpectedValueException
     *
     * @return bool
     */
    public function isAd(): bool
    {
        if (!is_bool($this->ad)) {
            throw new \UnexpectedValueException('Can´t check if profile is ad.');
        }

        return $this->ad;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return \MatthTavares\Instagram\Model\User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return \MatthTavares\Instagram\Model\Dimension
     */
    public function getDimension(): Dimension
    {
        return $this->dimension;
    }

    /**
     * @return int
     */
    public function getLikesCount(): int
    {
        return $this->likes;
    }

    /**
     * @return int
     */
    public function getCommentsCount(): int
    {
        return $this->comments;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'code'       => $this->code,
            'url'        => $this->url,
            'dimension'  => $this->dimension,
            'created_at' => $this->created->format("Y-m-d\TH:i:s\Z"),
            'user'       => $this->user,
            'tags'       => $this->tags,
            'likes'      => $this->likes,
            'comments'   => $this->comments,
            'is_ad'      => $this->ad,
            'caption'    => $this->caption,
            'location'   => $this->location,
        ];
    }
}
