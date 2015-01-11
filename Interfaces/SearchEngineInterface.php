<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Interfaces;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
interface SearchEngineInterface
{
    public function getName();
    public function getLocale();
    public function getTopLevelDomain();
    public function getRootUrl();
    public function getWebsites($needle, $limit);
    public function getPosition($needle, WebsiteInterface $website);
    public function getBacklinks(WebsiteInterface $website);
}
