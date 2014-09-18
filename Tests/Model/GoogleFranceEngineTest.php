<?php
namespace SeoTracker\SeoCore\Tests\Model;

use SeoTracker\SeoCore\Model\GoogleFranceEngine;

class GoogleFranceEngineTest extends \PHPUnit_Framework_TestCase
{
    private $crawler;
    private $engine;
    private $scrapper;

    public function setUp()
    {
        $this->crawler   = $this->getMock('\SeoTracker\SeoCore\Interfaces\CrawlerInterface');
        $this->scrapper = $this->getMock('\SeoTracker\SeoCore\Interfaces\ScrapperInterface');
        $this->engine    = new GoogleFranceEngine($this->scrapper, $this->crawler);
    }

    public function tearDown()
    {
        $this->crawler = null;
        $this->engine  = null;
        $this->scraper = null;
    }

    public function testLocales()
    {
        $this->assertEquals('fr', $this->engine->getLocale());
        $this->engine->setLocale('en');
        $this->assertEquals('en', $this->engine->getLocale());
    }

    public function testEngineName()
    {
        $this->assertEquals('Google Search Engine France', $this->engine->getName());

        $newEngine = new GoogleFranceEngine($this->scrapper, $this->crawler, 'Moteur de recherche Google France');
        $this->assertEquals('Moteur de recherche Google France', $newEngine->getName());
    }
}
