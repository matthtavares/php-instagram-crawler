<?php

namespace MatthTavares\Instagram\Factory;

use MatthTavares\Instagram\Model\Profile;
use MatthTavares\Instagram\Model\User;

class UserFactory
{
    /**
     * @param int    $id
     * @param string $username
     * @param string $picture
     * @param mixed  $name
     * @param mixed  $privated
     * @param mixed  $verified
     * @param mixed  $biography
     * @param mixed  $website
     * @param int    $followers
     * @param int    $follows
     * @param int    $media
     *
     * @return User
     */
    public static function create(
        int $id,
        string $username,
        string $picture,
        $name = null,
        $privated = false,
        $verified = null,
        $biography = null,
        $website = null,
        $followers = 0,
        $follows = 0,
        $media = 0
    ): User {
        return new User(
            $id,
            $username,
            $picture,
            new Profile(
                $privated,
                $verified,
                $biography,
                $website,
                $followers,
                $follows,
                $media
            ),
            $name
        );
    }
}
