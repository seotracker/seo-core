<?php
namespace SeoTracker\SeoCore\Exception;

use Exception;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class HttpNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('The location you are looking for is unreachable.', 0, null);
    }
}
