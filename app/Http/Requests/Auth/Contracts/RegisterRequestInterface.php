<?php

namespace App\Http\Requests\Auth\Contracts;

use App\DTO\Auth\Contracts\RegisterRequestDTOInterface as UserDTO;

interface RegisterRequestInterface
{
    public function rules(): array;

    public function getValidated(): UserDTO;
}
