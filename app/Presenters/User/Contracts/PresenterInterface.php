<?php

namespace App\Presenters\User\Contracts;

use App\DTO\User\Contracts\ResponseDTOInterface;

interface PresenterInterface
{
    public function present(ResponseDTOInterface $responseDTO): mixed;
}
