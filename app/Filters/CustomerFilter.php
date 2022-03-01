<?php

namespace App\Filters;

use App\Filters\CustomFilters\FilterNumberValid;
use Illuminate\Support\Arr;

class CustomerFilter extends BaseFilter
{
    public function applyFilters($data)
    {
        $this->filterCountry(Arr::get($data, 'country_code'))
             ->filterStatus(Arr::get($data, 'status'),Arr::get($data, 'country_code'));

        return $this;
    }

    protected function filterCountry($countryCode)
    {
        if (isset($countryCode))
            $this->query->where('phone', 'like', "($countryCode)%");
        return $this;
    }

    protected function filterStatus($status,$selectedCountry=NULL)
    {
        if (isset($status))
            $this->query = (new FilterNumberValid($this->query,$status,$selectedCountry))->apply();
        return $this;
    }

}
