<?php

declare(strict_types=1);

namespace MatthTavares\Instagram;

use PHPUnit\Framework\TestCase;
use MatthTavares\Instagram\Model\Coordinate;
use MatthTavares\Instagram\Model\Location;
use MatthTavares\Instagram\Model\Media;
use MatthTavares\Instagram\Model\Profile;
use MatthTavares\Instagram\Model\Tag;
use MatthTavares\Instagram\Model\User;

class CrawlerTest extends TestCase
{
    private $crawler;

    protected function setUp() : void
    {
        $this->crawler = new Crawler('46853347619%3AKxMfiPuz9mWWxD%3A15');
    }

    public function testGetMediaByTag()
    {
        $media = $this->crawler->getMediaByTag('php');
        file_put_contents(__DIR__.'/cache/testGetMediaByTag.json', json_encode($media));
        $this->assertGreaterThan(0, count($media));
    }

    public function testGetMediaByLocation()
    {
        $media = $this->crawler->getMediaByLocation(225963881);
        file_put_contents(__DIR__.'/cache/testGetMediaByLocation.json', json_encode($media));
        $this->assertGreaterThan(0, count($media));
    }

    public function testGetMediaByUser()
    {
        $media = $this->crawler->getMediaByUser('instagram');
        file_put_contents(__DIR__.'/cache/testGetMediaByUser.json', json_encode($media));
        $this->assertGreaterThan(0, count($media));
    }

    public function testGetMedia()
    {
        $media = $this->crawler->getMedia('BgOJQliAc6d');
        file_put_contents(__DIR__.'/cache/testGetMedia.json', json_encode($media));
        $this->assertInstanceOf(Media::class, $media);
        $this->assertEquals(1733363628813438621, $media->getId());
        $this->assertNotNull($media->getUrl());
        $this->assertInstanceOf(\DateTime::class, $media->getCreated());
        $this->assertInstanceOf(User::class, $media->getUser());
        $this->assertNull($media->getLocation());
        $this->assertFalse($media->isAd());
        $this->assertEquals('#30 Fairy💕@v_fairy_v', $media->getCaption());
        $this->assertEquals('BgOJQliAc6d', $media->getCode());
        $this->assertGreaterThan(0, count($media->getTags()));
        $this->assertEquals(1080, $media->getDimension()->getWidth());
        $this->assertEquals(1133, $media->getDimension()->getHeight());
        $this->assertGreaterThan(0, $media->getLikesCount());
        $this->assertGreaterThan(0, $media->getCommentsCount());
    }

    public function testGetMediaOnVideo()
    {
        $media = $this->crawler->getMedia('BgWhnmalRwU');
        file_put_contents(__DIR__.'/cache/testGetMediaOnVideo.json', json_encode($media));
        $this->assertInstanceOf(Media::class, $media);
        $this->assertGreaterThan(0, $media->getViews());
        $this->assertNotEquals('', $media->getThumb());
    }

    public function testGetUser()
    {
        $user = $this->crawler->getUser('matthtavares');
        file_put_contents(__DIR__.'/cache/testGetUser.json', json_encode($user));
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(276860269, $user->getId());
        $this->assertEquals('Mateus Tavares', $user->getName());
        $this->assertEquals('matthtavares', $user->getUserName());
        $this->assertNotEquals('', $user->getPicture());
        $this->assertInstanceOf(Profile::class, $user->getProfile());
        $this->assertFalse($user->getProfile()->isPrivated());
        $this->assertFalse($user->getProfile()->isVerified());
        $this->assertNotEquals('', $user->getProfile()->getBiography());
        $this->assertEquals('http://www.mateustavares.com.br/', $user->getProfile()->getWebsite());
        $this->assertGreaterThan(0, $user->getProfile()->getFollowersCount());
        $this->assertGreaterThan(0, $user->getProfile()->getFollowsCount());
        $this->assertGreaterThan(0, $user->getProfile()->getMediaCount());
    }

    public function testGetLocation()
    {
        $location = $this->crawler->getLocation(225963881);
        file_put_contents(__DIR__.'/cache/testGetLocation.json', json_encode($location));
        $this->assertInstanceOf(Location::class, $location);
        $this->assertEquals(225963881, $location->getId());
        $this->assertEquals('recife-pernambuco', $location->getSlug());
        $this->assertTrue($location->hasCoordinate());
        $this->assertEquals('Recife - Pernambuco', $location->getName());
        $this->assertInstanceOf(Coordinate::class, $location->getCoordinate());
        $this->assertEquals(-8.67597444337, $location->getCoordinate()->getLatitude());
        $this->assertEquals(-35.5767717627, $location->getCoordinate()->getLongitude());
    }

    public function testGetTag()
    {
        $tag = $this->crawler->getTag('php');
        file_put_contents(__DIR__.'/cache/testGetTag.json', json_encode($tag));
        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertGreaterThan(0, $tag->getCount());
    }

    public function testSearch()
    {
        $result = $this->crawler->search('paraiba');
        file_put_contents(__DIR__.'/cache/testSearch.json', json_encode($result));
        $this->assertGreaterThan(0, count($result));
    }

    public function testSearchOnHashTags()
    {
        $result = $this->crawler->search('taipei');
        file_put_contents(__DIR__.'/cache/testSearchOnHashTags.json', json_encode($result));
        $this->assertGreaterThan(0, count($result));
        $this->assertEquals('taipei', ($result['tags'][0])->getName());
        $this->assertGreaterThan(8739744, ($result['tags'][0])->getCount());
    }

    public function testSetClientOnEndCursor()
    {
        $media = $this->crawler->getMediaByTag('php');
        file_put_contents(__DIR__.'/cache/testSetClientOnEndCursor.json', json_encode($media));
        $this->assertGreaterThan(0, count($media));
        $this->crawler->setClientOnEndCursor();
        $this->assertGreaterThan(0, count($media));
    }
}
