<?php

namespace App\Repositories\Auth;

use App\DTO\Auth\Contracts\LoginRequestDTOInterface;
use App\Repositories\Auth\Contracts\LoginRepositoryInterface;
use App\Repositories\Auth\Exceptions\WrongCredentialsException;
use Couchbase\BaseException;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginRepositoryInterface
{
    public function make(LoginRequestDTOInterface $requestDTO): string
    {
        return Auth::attempt([
            'email' => $requestDTO->email,
            'password' => $requestDTO->password
        ])
            ? Auth::user()->createToken('auth-token')->plainTextToken
            : throw new \Exception();
    }
}
