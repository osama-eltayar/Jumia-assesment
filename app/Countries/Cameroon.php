<?php

namespace App\Countries;

class Cameroon extends BaseCountry
{

    public function getRegex()
    {
        return '\(237\)\ ?[2368]\d{7,8}$';
    }

    public function getCode()
    {
        return '237' ;
    }

}
