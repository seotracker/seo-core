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
        $location = 'http://www.seo-tracker.net';
        $website = new Website($this->crawler, $this->scrapper->get($location), $location);

        $this->assertEquals('SeoTracker : A SEO tools suite', $website->getTitle());
        $this->assertEquals($this->scrapper->get($location), $website->getContent());

        $this->assertInstanceOf('\DateTime', $website->getDate());
    }

    public function testGoogleSearchReturnWebsiteCollection()
    {
        $googleEngine = new GoogleFranceEngine($this->scrapper, $this->crawler);

        $websites = $googleEngine->getWebsites('ESGI', 10);
        $this->assertEquals($websites->count(), 7);
        $this->assertInstanceOf('SeoTracker\SeoCore\Collection\WebsiteCollection', $websites);
    }

    public function testGetPositionOnWebsiteReturnInteger()
    {
        $location = 'http://www.google.fr';
        $website = new Website($this->crawler, $this->scrapper->get($location), $location);
        $googleEngine = new GoogleFranceEngine($this->scrapper, $this->crawler);

        $this->assertEquals(1, $googleEngine->getPosition('google', $website));
        $this->assertEquals(0, $googleEngine->getPosition('foo', $website));
    }

    public function testMicroAndMetaDatasOfWebsite()
    {
         $location = 'http://www.mickael-andrieu.com/';
         $website = new Website($this->crawler, $this->scrapper->get($location), $location);

         var_dump($website->getMetas(), $website->getMicroDatas());
    }
}
