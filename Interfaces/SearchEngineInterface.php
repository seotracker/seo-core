<?php
namespace SeoTracker\SeoCore\Interfaces;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
interface SearchEngineInterface
{
    public function getName();
    public function getLocale();
    public function getRootUrl();
    public function getWebsites($needle, $limit);
    public function getPosition($needle, WebsiteInterface $website);
    public function getBacklinks(WebsiteInterface $website);
}
