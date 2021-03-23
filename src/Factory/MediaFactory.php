<?php

namespace MatthTavares\Instagram\Factory;

use MatthTavares\Instagram\Model\Dimension;
use MatthTavares\Instagram\Model\Location;
use MatthTavares\Instagram\Model\Photo;
use MatthTavares\Instagram\Model\Tag;
use MatthTavares\Instagram\Model\User;
use MatthTavares\Instagram\Model\Video;

class MediaFactory
{
    /**
     * @param int      $id
     * @param string   $code
     * @param string   $url
     * @param array    $dimension
     * @param int      $created
     * @param User     $user
     * @param int      $likes
     * @param int      $comments
     * @param bool     $ad
     * @param mixed    $caption
     * @param Location $location
     *
     * @return Photo
     */
    public static function createPhoto(
        int $id,
        string $code,
        string $url,
        array $dimension,
        int $created,
        User $user,
        int $likes = 0,
        int $comments = 0,
        bool $ad = false,
        $caption = null,
        Location $location = null
    ): Photo {
        return new Photo(
            $id,
            $code,
            $url,
            new Dimension($dimension['width'], $dimension['height']),
            new \DateTime("@{$created}"),
            $user,
            $caption ? self::extractHashtags($caption) : [],
            $likes,
            $comments,
            $ad,
            $caption,
            $location
        );
    }

    /**
     * @param int      $id
     * @param string   $code
     * @param string   $url
     * @param string   $thumb
     * @param int      $views
     * @param array    $dimension
     * @param int      $created
     * @param User     $user
     * @param int      $likes
     * @param int      $comments
     * @param bool     $ad
     * @param mixed    $caption
     * @param Location $location
     *
     * @return Video
     */
    public static function createVideo(
        int $id,
        string $code,
        string $url,
        string $thumb,
        int $views,
        array $dimension,
        int $created,
        User $user,
        int $likes = 0,
        int $comments = 0,
        bool $ad = false,
        $caption = null,
        Location $location = null
    ): Video {
        return new Video(
            $id,
            $code,
            $url,
            $thumb,
            $views,
            new Dimension($dimension['width'], $dimension['height']),
            new \DateTime("@{$created}"),
            $user,
            $caption ? self::extractHashtags($caption) : [],
            $likes,
            $comments,
            $ad,
            $caption,
            $location
        );
    }

    /**
     * Extract hashtags from the media caption.
     *
     * @param string $caption
     *
     * @return array
     */
    private static function extractHashtags( string $caption ): array
    {
        $tags = [];
        if (preg_match_all('/\S*#((?:\[[^\]]+\]|\S+))/i', $caption, $matches) > 0) {
            $tags = array_map(function ($tag): Tag {
                return TagFactory::create($tag);
            }, array_values(array_unique($matches[1])));
        }

        return $tags;
    }
}
