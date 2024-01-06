<?php

namespace App\Repositories\Criteria;

use App\Repositories\Criteria\Contracts\CriteriaInterface;
use Illuminate\Database\Eloquent\Builder;

class WhereInIdsCriterion implements CriteriaInterface
{
    public function __construct(
        private string     $table,
        private array|null $ids
    ) {
    }

    public function apply(Builder $query): void
    {
        $query->whereIn("$this->table.id", array_map('intval', $this->ids));
    }
}
