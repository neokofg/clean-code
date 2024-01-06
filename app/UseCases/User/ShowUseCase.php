<?php

namespace App\UseCases\User;

use App\DTO\User\Contracts\IndexResponseDTOInterface;
use App\DTO\User\Contracts\ResponseDTOInterface;
use App\Repositories\User\Contracts\ShowRepositoryInterface;
use App\UseCases\User\Contracts\ShowUseCaseInterface;
use App\UseCases\User\Exceptions\ShowUseCasesException;
use Throwable;

class ShowUseCase implements ShowUseCaseInterface
{
    public function __construct(
        private ShowRepositoryInterface $repository
    )
    {
    }

    public function execute(string $id): ResponseDTOInterface
    {
        try {
            return $this->repository->make($id);
        } catch (Throwable $exception) {
            throw new ShowUseCasesException("Пользователь $id не найден" . $exception, previous: $exception);
        }
    }
}
