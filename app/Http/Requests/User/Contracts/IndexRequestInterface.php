<?php

namespace App\Http\Requests\User\Contracts;

use App\DTO\User\Contracts\IndexRequestDTOInterface as UserDTO;

interface IndexRequestInterface
{
    public function rules(): array;

    public function getValidated(): UserDTO;
}
