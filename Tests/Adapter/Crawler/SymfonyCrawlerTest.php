<?php
namespace SeoTracker\SeoCore\Tests\Adapter\Crawler;

use SeoTracker\SeoCore\Adapter\Crawler\SymfonyCrawler;

class SymfonyCrawlerTest extends \PHPUnit_Framework_TestCase
{
    private $sfCrawler;

    public function setUp()
    {
        $this->sfCrawler = new SymfonyCrawler();
    }

    public function tearDown()
    {
        $this->sfCrawler = null;
    }

    public function testSetContent()
    {
        $this->sfCrawler->setContent('<html><head></head><body><div class="foo">bar</div></body></html>');
        $this->assertEquals('foo', $this->sfCrawler->getXPath('//div')->attr('class'), '->setContent() adds nodes from an HTML string');
    }

    public function testGet()
    {
        $this->sfCrawler->setContent('<html><head></head><body><div class="foo">bar</div></body></html>');
        $this->assertCount(1, $this->sfCrawler->get('.foo'), '->get() query the correct element');
    }

    public function testGetXPath()
    {
        $this->sfCrawler->setContent('<html><head></head><body><div class="foo">bar</div></body></html>');
        $this->assertCount(1, $this->sfCrawler->getXPath('//div[@class="foo"]'), '->getXPath() query the correct element');
    }

}
