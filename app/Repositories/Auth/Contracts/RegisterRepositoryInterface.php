<?php

namespace App\Repositories\Auth\Contracts;

use App\DTO\Auth\Contracts\RegisterRequestDTOInterface;

interface RegisterRepositoryInterface
{
    public function make(RegisterRequestDTOInterface $requestDTO): String;
}
