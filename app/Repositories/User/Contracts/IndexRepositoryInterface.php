<?php

namespace App\Repositories\User\Contracts;

use App\DTO\User\Contracts\IndexRequestDTOInterface;
use App\DTO\User\Contracts\IndexResponseDTOInterface;

interface IndexRepositoryInterface
{
    public function make(IndexRequestDTOInterface $requestDTO): IndexResponseDTOInterface;
}
