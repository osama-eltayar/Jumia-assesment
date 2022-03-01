<?php

namespace App\Filters\CustomFilters;

use Illuminate\Database\Eloquent\Builder;

interface CustomFilterInterface
{
    public function apply():Builder;
}
