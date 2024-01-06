<?php

namespace App\DTO\User;

use App\DTO\User\Contracts\ResponseDTOInterface;
use App\Models\User;

readonly class ResponseDTO implements ResponseDTOInterface
{
    public function __construct(
        public User $user,
    ) {
    }
}
