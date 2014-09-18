<?php
namespace SeoTracker\SeoCore\Tests\Exception;

use SeoTracker\SeoCore\Exception as Exceptions;

class ExceptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * @covers SeoTracker\SeoCore\Exception\AdapterNonAvailableException
	 */
    public function testAdapterNonAvailableException()
    {
        $e = new Exceptions\AdapterNonAvailableException();
        $this->assertEquals('The  adapter is unavailable, did you have installed the related dependencies ?', $e->getMessage());

        $e = new Exceptions\AdapterNonAvailableException('Curl');
        $this->assertEquals('The Curl adapter is unavailable, did you have installed the related dependencies ?', $e->getMessage());
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
