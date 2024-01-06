<?php

namespace App\Repositories\Criteria\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface CriteriaInterface
{
    public function apply(Builder $query): void;
}
