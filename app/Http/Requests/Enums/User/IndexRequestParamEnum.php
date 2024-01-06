<?php

namespace App\Http\Requests\Enums\User;

use App\Http\Requests\Enums\Contracts\RequestParamEnumInterface;

enum IndexRequestParamEnum: string implements RequestParamEnumInterface
{
    case Name = 'name';
    case Email = 'email';
}
