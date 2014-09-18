<?php
namespace SeoTracker\SeoCore\Exception;

use Exception;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class AdapterNonAvailableException extends Exception
{
    public function __construct($message = "")
    {
        $message = sprintf('The %s adapter is unavailable, did you have installed the related dependencies ?', $message);
        parent::__construct($message, 0, null);
    }
}
