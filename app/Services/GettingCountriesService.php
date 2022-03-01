<?php

namespace App\Services;

use App\Countries\Country;

class GettingCountriesService implements ServiceInterface
{

    public function execute($data = [])
    {
        return $this->getAllCodes();
    }

    protected function getAllCodes()
    {
        return collect(Country::CODES)->map(function($country){
            $country = new $country() ;
            return [
                'name' => $country->getName(),
                'value' => $country->getCode(),
            ];
        });
    }
}
