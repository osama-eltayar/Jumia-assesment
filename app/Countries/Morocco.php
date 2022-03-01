<?php

namespace App\Countries;

class Morocco extends BaseCountry
{

    public function getRegex()
    {
        return '\(212\)\ ?[5-9]\d{8}$';
    }

    public function getCode()
    {
        return '212';
    }
}
