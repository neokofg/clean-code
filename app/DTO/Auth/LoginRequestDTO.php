<?php

namespace App\DTO\Auth;

use App\DTO\Auth\Contracts\LoginRequestDTOInterface;

readonly class LoginRequestDTO implements LoginRequestDTOInterface
{
    public function __construct(
        public string   $email,
        public string   $password,
    )
    {
    }
}
