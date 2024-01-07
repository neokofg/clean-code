<?php

namespace App\Http\Requests\Enums\Auth;

use App\Http\Requests\Enums\Contracts\RequestParamEnumInterface;

enum RegisterRequestParamEnum: string implements RequestParamEnumInterface
{
    case Name = 'name';
    case Email = 'email';
    case Password = 'password';
}
