<?php

namespace App\UseCases\User\Contracts;

use App\DTO\User\Contracts\IndexRequestDTOInterface;
use App\DTO\User\Contracts\IndexResponseDTOInterface;

interface IndexUseCaseInterface
{
    public function execute(IndexRequestDTOInterface $requestDTO): IndexResponseDTOInterface;
}
