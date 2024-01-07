<?php

namespace App\Repositories\Auth;

use App\DTO\Auth\Contracts\RegisterRequestDTOInterface;
use App\DTO\User\Contracts\IndexRequestDTOInterface;
use App\Models\Enums\UserColumn;
use App\Models\User;
use App\Repositories\Auth\Contracts\RegisterRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterRepository implements RegisterRepositoryInterface
{
    public function __construct(
        private User    $user
    )
    {
    }

    public function make(RegisterRequestDTOInterface $requestDTO): string
    {
        $this->user->setColumn(UserColumn::Name, $requestDTO->name);
        $this->user->setColumn(UserColumn::Email, $requestDTO->email);
        $this->user->setColumn(UserColumn::Password, Hash::make($requestDTO->password));
        $this->user->save();

        return $this->user->createToken('auth-token')->plainTextToken;
    }
}
