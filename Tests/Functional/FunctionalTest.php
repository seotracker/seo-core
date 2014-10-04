<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Tests\Functional;

use SeoTracker\SeoCore\Adapter\Crawler\SymfonyCrawler;
use SeoTracker\SeoCore\Adapter\Scrapper\CurlScrapper;
use SeoTracker\SeoCore\Model\GoogleFranceEngine;
use SeoTracker\SeoCore\Model\Website;

class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    private $scrapper;
    private $crawler;

    public function setUp()
    {
        $this->crawler = new SymfonyCrawler();
        $this->scrapper = new CurlScrapper();
    }

    public function tearDown()
    {
        $this->crawler  = null;
        $this->scrapper = null;
    }

    public function testScrapWebsiteAndReturnCorrectWebsite()
    {
        $location = 'http://sample.seocore';
        $content = file_get_contents('./Tests/Fixtures/sample.html');
        $description = "seo-core is a common way to deal with websites, search engines, crawlers and scrappers.";
        $keywords = 'SEO, library, PHP';
        $website = new Website($this->crawler, $content, $location);

        $this->assertEquals('seo-core, a library for SEO', $website->getTitle());
        $this->assertEquals($content, $website->getContent());

        $this->assertInstanceOf('\DateTime', $website->getDate());
        $this->assertEquals($description, $website->getMetas()['description']);
        $this->assertEquals($keywords, $website->getMetas()['keywords']);
        $this->assertContains('seo-core is a PHP library',$website->getMicroDatas()[0]['properties']['description'][0]); // need more tests here
    }

    public function testGoogleSearchReturnWebsiteCollection()
    {
        $googleEngine = new GoogleFranceEngine($this->scrapper, $this->crawler);

        $websites = $googleEngine->getWebsites('ESGI', 10);
        $this->assertEquals($websites->count(), 8);
        $this->assertInstanceOf('SeoTracker\SeoCore\Collection\WebsiteCollection', $websites);
    }

    public function testGetPositionOnWebsiteReturnInteger()
    {
        $location = 'http://www.google.fr';
        $content = file_get_contents('./Tests/Fixtures/google.html');
        $website = new Website($this->crawler, $content, $location);
        $googleEngine = new GoogleFranceEngine($this->scrapper, $this->crawler);

        $this->assertEquals(1, $googleEngine->getPosition('google', $website));
        $this->assertEquals(0, $googleEngine->getPosition('foo', $website));
    }

    public function testGetBacklinksReturnArrayOfLinks()
    {
        $location = 'http://www.google.fr';
        $content = file_get_contents('./Tests/Fixtures/google.html');
        $googleEngine = new GoogleFranceEngine($this->scrapper, $this->crawler);
        $website = new Website($this->crawler, $content, $location);

        $this->assertEquals(100, count($googleEngine->getBacklinks($website)));
    }
}
