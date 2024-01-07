<?php

namespace App\UseCases\Auth;

use App\DTO\Auth\RegisterRequestDTO;
use App\Repositories\Auth\Contracts\RegisterRepositoryInterface;
use App\UseCases\Auth\Contracts\RegisterUseCaseInterface;
use App\UseCases\Auth\Exceptions\RegisterUseCasesException;
use Throwable;

class RegisterUseCase implements RegisterUseCaseInterface
{
    public function __construct(
        private RegisterRepositoryInterface $repository
    )
    {
    }

    public function execute(RegisterRequestDTO $requestDTO): String
    {
        try {
            $response = $this->repository->make($requestDTO);
            return $response;
        } catch(Throwable $exception) {
            throw new RegisterUseCasesException('Произошла ошибка при попытке регистрации пользователя.', previous: $exception);
        }
    }
}
