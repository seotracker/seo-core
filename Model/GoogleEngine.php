<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Model;

use SeoTracker\SeoCore\Collection\WebsiteCollection;
use SeoTracker\SeoCore\Interfaces\CrawlerInterface;
use SeoTracker\SeoCore\Interfaces\ScrapperInterface;
use SeoTracker\SeoCore\Interfaces\SearchEngineInterface;
use SeoTracker\SeoCore\Interfaces\WebsiteInterface;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class GoogleEngine implements SearchEngineInterface
{
    private $crawler;
    private $locale;
    private $name;
    private $scrapper;

    const LINK_SELECTOR = "#res div.g h3 > a";

    public function __construct(ScrapperInterface $scrapper, CrawlerInterface $crawler, $name = null, $locale = null)
    {
        $this->crawler  = $crawler;
        $this->locale   = $locale;
        $this->name     = $name;
        $this->scrapper = $scrapper;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale()
    {
        return !is_null($this->locale) ? $this->locale : 'en';
    }

    public function getTopLevelDomain()
    {
        return '.com';
    }

    public function getName()
    {
        return !is_null($this->name) ? $this->name : 'Google Search Engine';
    }

    public function getRootUrl()
    {
        return 'https://www.google'. $this->getTopLevelDomain() .'/search?';
    }

    /**
     * @return WebsiteCollection $websites a collection a websites
     */
    public function getWebsites($needle, $limit)
    {
        $url = $this->getRootUrl()."q=$needle&gbv=1&num=$limit";

        $content = $this->scrapper->get($url);
        $crawler = $this->crawler->setContent($content);
        $links   = $crawler->get(self::LINK_SELECTOR);

        $websites = new WebsiteCollection();

        foreach ($links as $position => $link) {
            $fullLocation = $link->getAttribute('href');
            $location = $this->cleanUrl(substr($fullLocation, 7));
            $websites->add($this->getWebsite($location));
        }

        return $websites;
    }

    /**
     * @return integer $position the position of Website in search engine
     */
    public function getPosition($needle, WebsiteInterface $website)
    {
        $url = $this->getRootUrl()."q=$needle&gbv=1&num=200";

        $crawler = $this->crawler->setContent($this->scrapper->get($url));
        $links   = $crawler->get(self::LINK_SELECTOR);

        foreach ($links as $position => $link) {
            $fullLocation = $link->getAttribute('href');
            $location = $this->cleanUrl(substr($fullLocation, 7));
            if ($website->getLocation() == $location || ($website->getLocation().'/') == $location) {
                return $position +1;
            }
        }

        return 0;
    }

    /**
     * @return array $backlinks array of backlinks
     */
    public function getBacklinks(WebsiteInterface $website)
    {
        $backlinks = [];
        $websiteLocation = urlencode($website->getLocation());
        $url = $this->getRootUrl().'q=link:"'. $websiteLocation . '"-site:'. $websiteLocation .'&num=100';

        $crawler = $this->crawler->setContent($this->scrapper->get($url));
        $links   = $crawler->get(self::LINK_SELECTOR);

        foreach ($links as $position => $link) {
            $fullLocation = $link->getAttribute('href');
            $location = $this->cleanUrl(substr($fullLocation, 7));
            $backlinks[] = $location;
        }

        return $backlinks;
    }

    public function getWebsite($location)
    {
        return new Website($this->crawler, $this->scrapper->get($location), $location);
    }

    protected function cleanUrl($url)
    {
        $position = strpos($url, '&sa=');
        if ($position === false) {
            return $url;
        } else {
            return substr($url, 0, $position);
        }
    }
}
