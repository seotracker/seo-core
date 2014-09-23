Seo-core library
================

Seo-core library was extracted from Seo-Tracker platform.
This is a common way to deal with websites, search engines and scrappers.

** Note that this library is still a work in progress. **

[![Build Status](https://api.travis-ci.org/seotracker/seo-core.svg?branch=master)](https://travis-ci.org/seotracker/seo-core)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/2c440481-3f27-4b15-a635-e7d701ac1ae4/small.png)](https://insight.sensiolabs.com/projects/2c440481-3f27-4b15-a635-e7d701ac1ae4)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/seotracker/seo-core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/seotracker/seo-core/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/seotracker/seo-core/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/seotracker/seo-core/?branch=master)


1) Websites
-----------

Website is an object representation of a real website.
A website **MUST** have a HTML content.

A website object can return useful data for SEO like:

* Website title
* Website metadata
* Website keywords occurrences and proportions
* Website location url

See ``WebsiteInterface`` for more information about it.

2) SearchEngines
----------------

SearchEngine is an object representation of a real search engine.
A search engine **SHOULD USE** a scrapper to get information from internet network.

A search engine can return useful datas for SEO like:

* All websites for a needle (aka a "keyword")
* Website position in the concerned search engine for a needle
* All backlinks for a website in this search engine

See ``SearchEngineInterface`` for more information about it.

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

See ``CrawlerInterface`` and implementation in ``Adapter\Crawler`` folder.


5) Example
----------

```php
<?php
use SeoTracker\SeoCore\Adapter\Crawler\SymfonyCrawler;
use SeoTracker\SeoCore\Adapter\Scrapper\CurlScrapper;
use SeoTracker\SeoCore\Model\GoogleFranceEngine;
use SeoTracker\SeoCore\Model\Website;

$crawler   = new SymfonyCrawler();
$scrapper = new CurlScrapper();
$googleEngine = new GoogleFranceEngine($scrapper, $crawler);

$website = $googleEngine->getWebsite('http://seo-tracker.net');

// position of website in Google
$position = $googleEngine->getPosition('seo tools online platform', $website); // 1

// title of website
$title = $website->getTitle(); // 'SeoTracker : A SEO tools suite'

// metas of website
$metas = $googleEngine->getMetas();
// ['description' => 'Seo Tracker est une plateforme de suivi et d'optimisation [..]']

// microdatas of website
$microDatas = $googleEngine->getMicroDatas();
/**
 * [0 =>
 *     'type' =>
 *         [0 => 'http://www.schema.org/CreativeWork']
 *     ,
 *     'properties' => [...]]
 * ],
 * [ 1 => [..] ]
 **/

// backlinks of website location in search engine
$backlinks = $googleEngine->getBacklinks($website);
/**
 * [
 *     0 => 'http://seo-core.com',
 *     1 => 'http://otherwebsite.backlink'
 * ]
 **/
```
