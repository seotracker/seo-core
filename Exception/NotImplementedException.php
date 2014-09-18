<?php
namespace SeoTracker\SeoCore\Exception;

use Exception;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class NotImplementedException extends Exception
{
    public function __construct()
    {
        parent::__construct('This method is not implemented for now.', 0, null);
    }
}
