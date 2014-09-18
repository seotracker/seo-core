Seo-core library
================

Seo-core library was extracted from Seo-Tracker platform.
This is a common way to deal with websites, search engines and scrappers.


1) Websites
-----------

Website is an object representation of a real website.
A website **MUST** have a HTML content.

A website object can return useful datas for SEO like:

* Website title
* Website metadatas
* Website keywords occurences and proportions
* Website location url

See ``WebsiteInterface`` for more informations about it.

2) SearchEngines
----------------

SearchEngine is an object representation of a real search engine.
A search engine **MAY** use a scrapper to get informations from internet network.

A search engine can return useful datas for SEO like:

* All websites for a needle (aka a "keyword")
* Website position in the concerned search engine for a needle
* All backlinks for a website in this search engine

See ``SearchEngineInterface`` for more informations about it.

3) Scrappers
------------

A scrapper is an object used to get HTML from internet network.

As this object have only 1 job to do, the only method to implement is ``get``
which accept at least 1 argument: an url location.

See ``ScrapperInterface`` and implementations in ``Adapter\Scrapper`` folder

4) Crawlers
-----------

A crawler is an object used to query and manipulate HTML DOM.

Seo-core offers an interface and his Symfony2-Component based implementation.

See ``CrawlerInterface`` and implementation in ``Adapeter\Crawler`` folder.


5) Example
----------

```php
<?php
use SeoTracker\SeoCore\Adapter\Scrapper\CurlScrapper;
use SeoTracker\SeoCore\Model\GoogleEngine;
use SeoTracker\SeoCore\Model\Website;


$scrapper = new CurlScrapper();
$GoogleEngine = new GoogleEngine($scrapper);

$website = $GoogleEngine->getWebsite('http://seo-tracker.net');

// position of website in Google
$position = $GoogleEngine->getPosition($website);

// title of website
$title = $website->getTitle();

// keywords of website
$keywords = $website->getKeywords(); // ['keyword1' => x, 'keyword2' => y, ...]

?>
```
