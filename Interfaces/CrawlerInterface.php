<?php
namespace SeoTracker\SeoCore\Interfaces;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
interface CrawlerInterface
{
    /**
	 * set HTML content to be parsed by
	 *
	 * @return self CrawlerInterface
	 */
    public function setContent($HTMLcontent);

    public function isOk();

    /**
	 * Helpers to query HTML content
	 *
	 * @return HTMLNode $node HTML Element
	 */
    public function get($cssSelector);
    public function getXPath($XPathSelector);
}
