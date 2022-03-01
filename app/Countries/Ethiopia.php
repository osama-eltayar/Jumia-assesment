<?php

namespace App\Countries;

class Ethiopia extends BaseCountry
{

    public function getRegex()
    {
        return "\(251\)\ ?[1-59]\d{8}$";
    }

    public function getCode()
    {
        return "251";
    }
}
