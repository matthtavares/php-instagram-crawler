# php-instagram-crawler
<img src="https://raw.githubusercontent.com/matthtavares/media/main/images/instagram-banner.jpg" align="center">

This is a minimalist Instagram crawler written in PHP. It can query media, accounts, videos, comments, search for users, tags, locations etc, using only the public data from Instagram.

For this, he only needs a session cookie called "sessionid", obtained after logging into Instagram. After the cookie is used for the first time, it will be revalidated whenever the crawler is called, as long as it is within the initial validity of the cookie.

The goal of this project is to become as minimalist as possible while still having all the needed functionality so that its easy to add code to it!

Any ⭐️ or contribution is appreciated if you like the project 🤘

## How to install
Simply run:
```
composer install matthtavares/php-instagram-crawler
```

## Usages
First of all, login to Instagram through your browser, in this example we use Google Chrome. Open the Element Inspector (CTRL + SHIFT + I), go to the "Storage" tab, "Cookies" section and select the Instagram domain. Look for the "sessionid" cookie, copy its contents and then paste it into the Crawler.

<img src="https://raw.githubusercontent.com/matthtavares/media/main/images/instagram-sessionid.png" align="center">

Paste the value you copied when creating the Crawler instance.

```php
use MatthTavares\Instagram\Crawler;

$crawler = new Crawler("46638291619%3AKxMfiPuz9mWWxD%3A15");

// Get media by tag
$media = $crawler->getMediaByTag('php');

// Get media by location (João Pessoa)
$media = $crawler->getMediaByLocation(213472429);

// Get media by user
$media = $crawler->getMediaByUser('instagram');

// Get info of a specific media by its code
$info = $crawler->getMedia('BgOJQliAc6d');

// Get info about a user
$profile = $crawler->getUser('matthtavares');

// Search for a term
$search = $crawler->search('paraiba');
```

## Recommended Limits
If you make too many requests too fast you will get a 429 Error or something similar.
- It is recommended to make a short break between each request of 30s (+- random)
- In between all 10 requests a long break (300-600s)

If different cookies from different accounts are used for all requests and the circle doesn't repeat too fast these limits don't apply.

Feel free to make your own tests and let us know of any limits you experienced.

## More usages
Examples will be added asap...