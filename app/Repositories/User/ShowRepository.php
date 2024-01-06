<?php

namespace App\Repositories\User;

use App\DTO\User\ResponseDTO;
use App\Repositories\Criteria\Contracts\CriteriaApplierInterface;
use App\Repositories\User\Contracts\ShowRepositoryInterface;

class ShowRepository implements ShowRepositoryInterface
{
    public function __construct(
        private CriteriaApplierInterface $criteriaApplier
    )
    {
    }

    public function make(string $id): ResponseDTO
    {
        $user = $this->criteriaApplier->findOrFail($id);

        return new ResponseDTO($user);
    }
}
