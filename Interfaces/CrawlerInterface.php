<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Interfaces;

use DOMElement;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
interface CrawlerInterface
{
    /**
     * set HTML content to be parsed by
     *
     * @param string $HTMLcontent HTML Content
     *
     * @return $this self Object
     */
    public function setContent($HTMLcontent);

    /**
     * Adapter can be used
     *
     * @return boolean
     */
    public function isOk();

    /**
     * Helpers to query HTML content
     *
     * @param string $cssSelector CSS Selector
     *
     * @return DOMElement $node HTML Element
     */
    public function get($cssSelector);

    /**
     * Get XPath
     *
     * @param string $XPathSelector XPath Selector
     *
     * @return DOMElement $node HTML Element
     */
    public function getXPath($XPathSelector);
}
