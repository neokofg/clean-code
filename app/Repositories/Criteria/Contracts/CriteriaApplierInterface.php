<?php

namespace App\Repositories\Criteria\Contracts;

interface CriteriaApplierInterface
{
    public function addCriterion(CriteriaInterface $criterion): void;
}
