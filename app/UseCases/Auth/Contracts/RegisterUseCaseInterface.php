<?php

namespace App\UseCases\Auth\Contracts;

use App\DTO\Auth\RegisterRequestDTO;

interface RegisterUseCaseInterface
{
    public function execute(RegisterRequestDTO $requestDTO): String;
}
