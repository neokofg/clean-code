<?php

namespace App\Presenters\User\Contracts;

use App\DTO\User\Contracts\IndexResponseDTOInterface;

interface ListPresenterInterface
{
    public function present(IndexResponseDTOInterface $responseDTO): mixed;
}

