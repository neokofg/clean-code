<?php

namespace App\Repositories\Criteria;

use App\Models\Enums\Contracts\ModelColumnInterface;
use App\Repositories\Criteria\Contracts\CriteriaInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WhereLikeCenterCriterion implements CriteriaInterface
{
    public function __construct(
        private string               $table,
        private ModelColumnInterface $column,
        private mixed                $value
    ) {
    }

    public function apply(Builder $query): void
    {
        $query->where("$this->table.{$this->column->value}", 'like', "%$this->value%");
    }
}
