<?php

namespace App\Filters\CustomFilters;

use App\Countries\Country;
use Illuminate\Database\Eloquent\Builder;

class FilterNumberValid implements CustomFilterInterface
{
    private $query;
    private $selectedCountry;
    private $status;

    /**
     * @param Builder $query
     * @param bool    $status
     * @param         $selectedCountry
     */
    public function __construct(Builder $query, bool $status, $selectedCountry = null)
    {

        $this->query = $query;
        $this->status = $status;
        $this->selectedCountry = $selectedCountry;
    }

    public function apply(): Builder
    {
        return $this->query->where(function ($query){
            foreach (Country::CODES as $country) {
                $country = new $country() ;
                $code = $country->getCode();
                $regex = $country->getRegex();

                if ($this->selectedCountry && $this->selectedCountry != $code)
                    continue;

                $this->status ? $this->filterMatchNumber($query,$regex) : $this->filterNotMatchNumber($query,$regex);

                if ($this->selectedCountry && $this->selectedCountry == $code)
                    break;
            }
        });
    }

    private function filterMatchNumber(Builder $query,$regex)
    {
        return $query->orWhereRaw("phone REGEXP '".$regex."'");
    }

    private function filterNotMatchNumber(Builder $query,$regex)
    {
        return $query->whereRaw("phone not REGEXP '".$regex."'");
    }
}
