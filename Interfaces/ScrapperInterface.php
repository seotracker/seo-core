<?php
namespace SeoTracker\SeoCore\Interfaces;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
interface ScrapperInterface
{
    /**
	 * Get HTML content from an http(s) location
	 *
	 * @return String $htmlContent HTML content
	 */
    public function get($location);

    public function isOk();
}
