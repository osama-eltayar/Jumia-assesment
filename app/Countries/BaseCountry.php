<?php

namespace App\Countries;

use ReflectionClass;

abstract class BaseCountry implements CountryInterface
{
    public function getName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

    public function getSQlPattern()
    {
        $regex = $this->getRegex();

    }
}
