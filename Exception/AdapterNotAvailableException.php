<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Exception;

use Exception;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
class AdapterNotAvailableException extends Exception
{
    /**
     * Construct
     *
     * @param string $message Message
     */
    public function __construct($message = "")
    {
        $message = sprintf('The %s adapter is unavailable, did you have installed the related dependencies ?', $message);

        parent::__construct($message, 0, null);
    }
}
