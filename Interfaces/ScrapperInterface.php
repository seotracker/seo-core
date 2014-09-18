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

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
interface ScrapperInterface
{
    /**
     * Get the content given its http(s) location
     *
     * @param string $location Location url
     *
     * @return string Location content
     */
    public function get($location);

    /**
     * Adapter can be used
     *
     * @return boolean
     */
    public function isOk();
}
