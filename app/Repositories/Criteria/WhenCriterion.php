<?php

namespace App\Repositories\Criteria;

use App\Repositories\Criteria\Contracts\CriteriaInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WhenCriterion implements CriteriaInterface
{
    public function __construct(
        private mixed              $value,
        private CriteriaInterface $criterion
    ) {
    }

    public function apply(Builder $query): void
    {
        $query->when(isset($this->value), fn() => $this->criterion->apply($query));
    }
}
