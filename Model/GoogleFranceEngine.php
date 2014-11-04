<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Model;

use SeoTracker\SeoCore\Interfaces\CrawlerInterface;
use SeoTracker\SeoCore\Interfaces\ScrapperInterface;
use SeoTracker\SeoCore\Model\GoogleEngine;
use SeoTracker\SeoCore\Interfaces\SearchEngineInterface;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class GoogleFranceEngine extends GoogleEngine implements SearchEngineInterface
{
    public function __construct(ScrapperInterface $scrapper, CrawlerInterface $crawler, $name = 'Google Search Engine France', $locale = 'fr')
    {
        parent::__construct($scrapper, $crawler, $name, $locale);
    }

    public function getTopLevelDomain()
    {
        return '.fr';
    }
}

