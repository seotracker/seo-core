<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Tests\Adapter\Scrapper;

use SeoTracker\SeoCore\Adapter\Scrapper\CurlScrapper;

class CurlScrapperTest extends \PHPUnit_Framework_TestCase
{
    private $cuScrapper;

    public function setUp()
    {
        $this->cuScrapper = new CurlScrapper();
    }

    public function tearDown()
    {
        $this->cuScrapper = null;
    }

    public function testGet()
    {
        $this->assertNotNull($this->cuScrapper->get('http://www.seo-tracker.net'));
    }
}
