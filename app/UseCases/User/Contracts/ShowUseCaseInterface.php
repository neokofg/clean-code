<?php

namespace App\UseCases\User\Contracts;

use App\DTO\User\Contracts\IndexResponseDTOInterface;
use App\DTO\User\Contracts\ResponseDTOInterface;

interface ShowUseCaseInterface
{
    public function execute(string $id): ResponseDTOInterface;
}
