<?php

namespace App\Repositories\User;

use App\DTO\User\Contracts\IndexRequestDTOInterface;
use App\DTO\User\IndexResponseDTO;
use App\Models\Enums\UserColumn;
use App\Models\User;
use App\Repositories\Criteria\Contracts\CriteriaApplierInterface;
use App\Repositories\Criteria\PaginationCriterion;
use App\Repositories\Criteria\WhenCriterion;
use App\Repositories\Criteria\WhereInIdsCriterion;
use App\Repositories\Criteria\WhereLikeCenterCriterion;
use App\Repositories\User\Contracts\IndexRepositoryInterface;

class IndexRepository implements IndexRepositoryInterface
{
    private IndexRequestDTOInterface $requestDTO;

    public function __construct(
        private CriteriaApplierInterface $criteriaApplier
    ) {
    }

    public function make(IndexRequestDTOInterface $requestDTO): IndexResponseDTO
    {
        $this->requestDTO = $requestDTO;

        $this->addWhereName();
        $this->addWhereEmail();

        $count = $this->criteriaApplier->count();

        $this->addPaginationCriterion();
        $this->addWhereInIdsCriterion();

        $collection = $this->criteriaApplier->get();

       return new IndexResponseDTO($collection, $count);
    }

    private function addWhereName(): void
    {
        $this->criteriaApplier->addCriterion(
            new WhenCriterion(
                $this->requestDTO->name,
                new WhereLikeCenterCriterion(
                    User::TABLE_NAME,
                    UserColumn::Name,
                    $this->requestDTO->name
                )
            )
        );
    }

    private function addWhereEmail(): void
    {
        $this->criteriaApplier->addCriterion(
            new WhenCriterion(
                $this->requestDTO->email,
                new WhereLikeCenterCriterion(
                    User::TABLE_NAME,
                    UserColumn::Email,
                    $this->requestDTO->email
                )
            )
        );
    }

    private function addPaginationCriterion(): void
    {
        $this->criteriaApplier->addCriterion(
            new PaginationCriterion(
                User::TABLE_NAME,
                $this->requestDTO->paginationDTO->sortColumn,
                $this->requestDTO->paginationDTO->sortType,
                $this->requestDTO->paginationDTO->start,
                $this->requestDTO->paginationDTO->end
            )
        );
    }

    private function addWhereInIdsCriterion(): void
    {
        $this->criteriaApplier->addCriterion(
            new WhenCriterion(
                $this->requestDTO->paginationDTO->ids,
                new WhereInIdsCriterion(
                    User::TABLE_NAME,
                    $this->requestDTO->paginationDTO->ids,
                )
            )
        );
    }
}
