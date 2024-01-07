<?php

namespace App\DTO\Auth;

use App\DTO\Auth\Contracts\RegisterRequestDTOInterface;

readonly class RegisterRequestDTO implements RegisterRequestDTOInterface
{
    public function __construct(
        public string   $name,
        public string   $email,
        public string   $password
    )
    {
    }
}
