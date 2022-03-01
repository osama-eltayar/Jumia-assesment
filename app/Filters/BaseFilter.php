<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter implements FilterInterface
{
    protected Builder $query ;

    private function __construct(Builder $query)
    {
        $this->query = $query ;
    }

    public static function make(Builder $builder,array $data): Builder
    {
        return (new static($builder))->applyFilters($data)->getQuery();
    }

    protected function getQuery() :Builder
    {
        return $this->query ;
    }
}
