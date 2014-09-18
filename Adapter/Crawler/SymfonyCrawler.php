<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Adapter\Crawler;

use DOMElement;
use SeoTracker\SeoCore\Interfaces\CrawlerInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
class SymfonyCrawler extends Crawler implements CrawlerInterface
{
    /**
     * set HTML content to be parsed by
     *
     * @param string $HTMLcontent Html content
     *
     * @return $this self Object
     */
    public function setContent($HTMLcontent)
    {
        $this->clear();
        $this->addHtmlContent($HTMLcontent);

        return $this;
    }

    /**
     * Adapter can be used
     *
     * @return boolean
     */
    public function isOk()
    {
        return class_exists('Symfony\\Component\\DomCrawler\\Crawler');
    }

    /**
     * Query HTML content from CSS selector
     *
     * @param string $cssSelector CSS Selector
     *
     * @return DOMElement $node HTML Element
     */
    public function get($cssSelector)
    {
        return $this->filter($cssSelector);
    }

    /**
     * Query HTML content from XPath selector
     *
     * @param string $XPathSelector XPath Selector
     *
     * @return DOMElement $node HTML Element
     */
    public function getXPath($XPathSelector)
    {
        return $this->filterXPath($XPathSelector);
    }
}
