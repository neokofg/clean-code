<?php

namespace App\Repositories\Auth\Contracts;

use App\DTO\Auth\Contracts\LoginRequestDTOInterface;

interface LoginRepositoryInterface
{
    public function make(LoginRequestDTOInterface $requestDTO): String;
}
