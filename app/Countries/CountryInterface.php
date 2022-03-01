<?php

namespace App\Countries;

interface CountryInterface
{
    public function getRegex();

    public function getCode();

    public function getName();
}
