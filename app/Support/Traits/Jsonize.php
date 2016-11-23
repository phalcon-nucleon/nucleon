<?php

namespace App\Support\Traits;

/**
 * Class Jsonize
 *
 * @package Neutrino\Support\Traits
 */
trait Jsonize
{
    /**
     * @return \stdClass
     */
    abstract public function toObject();

    /**
     * @return \stdClass
     */
    public function jsonSerialize()
    {
        return $this->toObject();
    }
}
