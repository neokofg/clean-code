<?php

namespace App\UseCases\Auth\Contracts;

use App\DTO\Auth\LoginRequestDTO;

interface LoginUseCaseInterface
{
    public function execute(LoginRequestDTO $requestDTO): String;
}
