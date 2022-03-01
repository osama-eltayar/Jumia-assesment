<?php

namespace App\Countries;

class Uganda extends BaseCountry
{

    public function getRegex()
    {
        return '\(256\)\ ?\d{9}$';
    }

    public function getCode()
    {
        return '256' ;
    }
}
