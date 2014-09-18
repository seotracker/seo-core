<?php
namespace SeoTracker\SeoCore\Interfaces;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
interface WebsiteInterface
{
    public function getTitle();
    public function getMetas();
    public function getKeywords();
    public function getContent();
    public function getLocation();
    public function getDate();
}
