<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Adapter\Scrapper;

use SeoTracker\SeoCore\Interfaces\ScrapperInterface;
use SeoTracker\SeoCore\Exception\NotImplementedException;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class CurlScrapper implements ScrapperInterface
{
    public function get($location)
    {
        if ($this->isOk()) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $location);
            curl_setopt_array($ch, array(
                CURLOPT_HEADER          => 0,
                CURLOPT_USERAGENT       => "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)",
                CURLOPT_RETURNTRANSFER  => 1,
                CURLOPT_CONNECTTIMEOUT  => 30,
                CURLOPT_FOLLOWLOCATION  => 1,
                CURLOPT_MAXREDIRS       => 2,
                CURLOPT_SSL_VERIFYPEER  => 0
            ));
            $content = curl_exec($ch);
            curl_close($ch);

            return $content;
        }

        throw new NotImplementedException('ext-curl');

    }

    public function isOk()
    {
        return function_exists('curl_version');
    }
}
