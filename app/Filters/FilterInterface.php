<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public static function make(Builder $builder, array $data):Builder;

    public function applyFilters(array $data);
}
