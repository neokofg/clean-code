<?php

namespace App\Repositories\User\Contracts;

use App\DTO\User\Contracts\ResponseDTOInterface;

interface ShowRepositoryInterface
{
    public function make(string $id): ResponseDTOInterface;
}

