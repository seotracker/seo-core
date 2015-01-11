<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Tests\Exception;

use SeoTracker\SeoCore\Exception as Exceptions;

class ExceptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers SeoTracker\SeoCore\Exception\AdapterNotAvailableException
     */
    public function testAdapterNotAvailableException()
    {
        $e = new Exceptions\AdapterNotAvailableException();
        $this->assertEquals('The  adapter is unavailable, did you have installed the related dependencies ?', $e->getMessage());

        $e = new Exceptions\AdapterNotAvailableException('Curl');
        $this->assertEquals('The Curl adapter is unavailable, did you have installed the related dependencies ?', $e->getMessage());
    }

    /**
     * @covers SeoTracker\SeoCore\Exception\DependencyNotAvailableException
     */
    public function testDependencyNotAvailableException()
    {
        $e = new Exceptions\DependencyNotAvailableException();
        $this->assertEquals('Undefined dependency is unavailable, did you have installed it ?', $e->getMessage());

        $e = new Exceptions\DependencyNotAvailableException('Symfony CSS Selector');
        $this->assertEquals('Symfony CSS Selector is unavailable, did you have installed it ?', $e->getMessage());
    }

    /**
     * @covers SeoTracker\SeoCore\Exception\HttpNotFoundException
     */
    public function testHttpNotFoundException()
    {
        $e = new Exceptions\HttpNotFoundException();
        $this->assertEquals('The location you are looking for is unreachable.', $e->getMessage());
    }

    /**
     * @covers SeoTracker\SeoCore\Exception\NotImplementedException
     */
    public function testNotImplementedException()
    {
        $e = new Exceptions\NotImplementedException();
        $this->assertEquals('This method is not implemented for now.', $e->getMessage());
    }
}
