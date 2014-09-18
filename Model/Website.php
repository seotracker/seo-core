<?php
namespace SeoTracker\SeoCore\Model;

use SeoTracker\SeoCore\Interfaces\WebsiteInterface;
use SeoTracker\SeoCore\Interfaces\CrawlerInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class Website implements WebsiteInterface
{
    private $content;
    private $date;
    private $keywords;
    private $location;
    private $metas;
    private $crawler;
    private $title;

    public function __construct(CrawlerInterface $crawler, $content, $location)
    {
        $this->content  = $content;
        $this->date     = new \DateTime();
        $this->location = $location;
        $this->crawler  = $crawler->setContent($content);
    }

    public function getTitle()
    {
        return $this->crawler->getXPath('//title')->text();
    }

    public function getMetas()
    {
        return $this->metas;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getDate()
    {
        return $this->date;
    }
}
