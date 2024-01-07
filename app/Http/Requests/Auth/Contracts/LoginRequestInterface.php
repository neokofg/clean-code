<?php

namespace App\Http\Requests\Auth\Contracts;

use App\DTO\Auth\Contracts\LoginRequestDTOInterface;

interface LoginRequestInterface
{
    public function rules(): array;

    public function getValidated(): LoginRequestDTOInterface;
}
