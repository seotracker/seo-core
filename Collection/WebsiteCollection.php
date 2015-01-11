<?php

/**
 * This file is part of the Seo Core package
 *
 * Copyright (c) 2014 - 2015 Mickaël Andrieu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SeoTracker\SeoCore\Collection;

use ArrayAccess;

use SeoTracker\SeoCore\Interfaces\WebsiteInterface;

/**
 * This file is part of Seo-Core library of SeoTracker project
 *
 * @author Mickaël Andrieu <mickael.andrieu@hotmail.fr>
 */
class WebsiteCollection implements ArrayAccess
{
    /**
     * @var array
     *
     * websites
     */
    private $websites;

    /**
     * Construct method
     *
     * @param array $websites
     */
    public function __construct($websites = array())
    {
        $this->websites = $websites;
    }

    /**
     * Adds website in collection
     *
     * @param WebsiteInterface $website Website
     *
     * @return $this self Object
     */
    public function add(WebsiteInterface $website)
    {
        $this->websites[] = $website;

        return $this;
    }

    /**
     * Removed an element given its key
     *
     * @param string $key Element key
     *
     * @return $this|null
     */
    public function remove($key)
    {
        if ( ! isset($this->websites[$key]) && ! array_key_exists($key, $this->websites)) {
            return null;
        }

        unset($this->websites[$key]);

        return $this;
    }

    /**
     * Remove element from collection
     *
     * @param WebsiteInterface $website Element to remove
     *
     * @return bool
     */
    public function removeElement(WebsiteInterface $website)
    {
        $key = array_search($website, $this->websites, true);

        if ($key === false) {
            return false;
        }
        unset($this->websites[$key]);

        return true;
    }

    /**
     * Remove all websites
     *
     * @return $this self Object
     */
    public function clear()
    {
        $this->websites = array();

        return $this;
    }

    /**
     * Count all websites
     *
     * @return int Number of websites
     */
    public function count()
    {
        return count($this->websites);
    }

    /**
     * Return all the websites in an array
     *
     * @return string[]
     */
    public function toArray()
    {
        return $this->websites;
    }

    /**
     * Set a value given its offset
     *
     * @param mixed $offset Offset
     * @param mixed $value  Value
     *
     * @return $this self Object
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->websites[] = $value;
        } else {
            $this->websites[$offset] = $value;
        }

        return $this;
    }

    /**
     * Return if offset exists
     *
     * @param mixed $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->websites[$offset]);
    }

    /**
     * Unset a position
     *
     * @param mixed $offset Offset
     *
     * @return $this self Object
     */
    public function offsetUnset($offset)
    {
        unset($this->websites[$offset]);

        return $this;
    }

    /**
     * Return an element given its offset
     *
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->websites[$offset]) ? $this->websites[$offset] : null;
    }
}
