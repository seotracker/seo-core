<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Tests\Collection;

use SeoTracker\SeoCore\Collection\WebsiteCollection;

class WebsiteCollectionTest extends \PHPUnit_Framework_TestCase
{
    private $websiteCollection;

    public function setUp()
    {
        $this->websiteCollection = new WebsiteCollection();
    }

    public function tearDown()
    {
        $this->websiteCollection = null;
    }

    public function testAdd()
    {
        $this->websiteCollection
            ->add($this->createWebsite())
            ->add($this->createWebsite())
        ;

        $this->assertEquals($this->websiteCollection->count(), 2);
    }

    public function testRemove()
    {
        $website1 = $this->createWebsite();
        $website2 = $this->createWebsite();
        $website3 = $this->createWebsite();
        $websites = [$website1, $website2, $website3];
        $websiteCollection = new WebsiteCollection($websites);
        $websiteCollection->removeElement($website1);

        $this->assertEquals($websiteCollection->count(), 2);
        $this->assertEquals($websiteCollection[1], $website2);

    }

    public function testClear()
    {
        $website1 = $this->createWebsite();
        $website2 = $this->createWebsite();

        $this->websiteCollection[] = $website1;
        $this->websiteCollection[] = $website2;
        $this->websiteCollection->clear();

        $this->assertEquals($this->websiteCollection->count(), 0);

    }

    public function testCount()
    {
        $website1 = $this->createWebsite();
        $this->websiteCollection[] = $website1;
        $this->assertEquals($this->websiteCollection->count(), 1);

        $this->websiteCollection[] = $website1;
        $this->assertEquals($this->websiteCollection->count(), 2);
    }

    private function createWebsite()
    {
        return $this->getMockBuilder('\SeoTracker\SeoCore\Interfaces\WebsiteInterface')
            ->getMock();
    }
}
