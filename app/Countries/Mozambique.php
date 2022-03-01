<?php

namespace App\Countries;

class Mozambique extends BaseCountry
{

    public function getRegex()
    {
        return '\(258\)\ ?[28]\d{7,8}$';
    }

    public function getCode()
    {
        return '258' ;
    }
}
