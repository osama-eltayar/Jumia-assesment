<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use ReflectionClass;

trait HasFilters
{
    protected $filterNameSpace = 'App\\Filters\\';

    protected function getFilterClass()
    {
        return $this->filterNameSpace . $this->getModelClassName() . 'Filter';
    }

    protected function getModelClassName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

    public function scopeFilter(Builder $query, array $filterData)
    {
        return $this->getFilterClass()::make($query, $filterData);
    }

}
