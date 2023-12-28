<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        checkPermission(Auth::user(), 'viewAny', User::class);
        return $this->model->all();
    }

    public function getById($id): User
    {
        $user = $this->model->findOrFail($id);
        checkPermission(Auth::user(), 'view', $user);
        return $user;
    }

    public function create(UserDTO $userDTO): User
    {
        checkPermission(Auth::user(), 'create', User::class);
        $user = new User();
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = $userDTO->password;
        $user->save();

        return $user;
    }

    public function update(UserDTO $userDTO): User
    {
        $user = $this->model->findOrFail($userDTO->id);
        checkPermission(Auth::user(), 'update', $user);
        foreach ($userDTO as $key => $value) {
            if(isset($userDTO->{$key})) {
                $user->$key = $value;
            }
        }
        $user->save();

        return $user;
    }

    public function delete(string $id): Bool
    {
        $user = $this->model->findOrFail($id);
        checkPermission(Auth::user(), 'delete', $user);
        return $user->delete();
    }

}
