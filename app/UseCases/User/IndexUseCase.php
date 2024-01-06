<?php

namespace App\UseCases\User;

use App\DTO\User\Contracts\IndexRequestDTOInterface;
use App\DTO\User\Contracts\IndexResponseDTOInterface;
use App\Repositories\User\Contracts\IndexRepositoryInterface;
use App\UseCases\User\Contracts\IndexUseCaseInterface;
use App\UseCases\User\Exceptions\IndexUseCasesException;
use Throwable;

class IndexUseCase implements IndexUseCaseInterface
{
    public function __construct(
        private IndexRepositoryInterface $repository
    )
    {
    }

    public function execute(IndexRequestDTOInterface $requestDTO): IndexResponseDTOInterface
    {
        try {
            return $this->repository->make($requestDTO);
        } catch (Throwable $exception) {
            throw new IndexUseCasesException('Произошла ошибка при попытке получить пользователей.', previous: $exception);
        }
    }
}
