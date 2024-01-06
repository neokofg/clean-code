<?php

namespace App\Repositories\Criteria;

use App\Enums\SortTypeEnum;
use App\Models\Enums\Contracts\ModelColumnInterface;
use App\Repositories\Criteria\Contracts\CriteriaInterface;
use Illuminate\Database\Eloquent\Builder;

class   PaginationCriterion implements CriteriaInterface
{
    public function __construct(
        private string               $table,
        private ModelColumnInterface $sortColumn,
        private SortTypeEnum         $sortType,
        private int                  $start,
        private int                  $end
    ) {
    }

    public function apply(Builder $query): void
    {
        $query->orderBy("$this->table.{$this->sortColumn->value}", $this->sortType->value)
            ->skip($this->start)
            ->take($this->end - $this->start);
    }
}
