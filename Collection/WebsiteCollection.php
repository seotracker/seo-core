<?php
namespace SeoTracker\SeoCore\Collection;

use SeoTracker\SeoCore\Interfaces\WebsiteInterface;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 *
 */
class WebsiteCollection implements \ArrayAccess
{
    private $websites;

    public function __construct($websites = array())
    {
        $this->websites = $websites;
    }

    public function add(WebsiteInterface $website)
    {
        $this->websites[] = $website;

        return $this;
    }

    public function remove($key)
    {
        if ( ! isset($this->websites[$key]) && ! array_key_exists($key, $this->websites)) {
            return null;
        }
        unset($this->websites[$key]);

        return $this;
    }

    public function removeElement(WebsiteInterface $website)
    {
        $key = array_search($website, $this->websites, true);

        if ($key === false) {
            return false;
        }
        unset($this->websites[$key]);

        return true;
    }

    public function clear()
    {
        $this->websites = array();

        return $this;
    }

    public function count()
    {
        return count($this->websites);
    }

    public function toArray()
    {
        return $this->websites;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->websites[] = $value;
        } else {
            $this->websites[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->websites[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->websites[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->websites[$offset]) ? $this->websites[$offset] : null;
    }
}
