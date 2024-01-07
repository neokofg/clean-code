<?php

namespace App\Http\Requests\Enums\Auth;

use App\Http\Requests\Enums\Contracts\RequestParamEnumInterface;

enum LoginRequestParamEnum: string implements RequestParamEnumInterface
{
    case Email = 'email';
    case Password = 'password';
}
