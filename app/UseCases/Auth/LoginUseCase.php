<?php

namespace App\UseCases\Auth;

use App\DTO\Auth\LoginRequestDTO;
use App\Repositories\Auth\LoginRepository;
use App\UseCases\Auth\Contracts\LoginUseCaseInterface;
use App\UseCases\Auth\Exceptions\LoginUseCasesException;
use Throwable;

class LoginUseCase implements LoginUseCaseInterface
{
    public function __construct(
        private LoginRepository $repository
    )
    {
    }

    public function execute(LoginRequestDTO $requestDTO): string
    {
        try {
            $response = $this->repository->make($requestDTO);
            return $response;
        } catch (Throwable $exception) {
            throw new LoginUseCasesException('Произошла ошибка при попытке войти в аккаунт!', previous: $exception);
        }
    }
}
