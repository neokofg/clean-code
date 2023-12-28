<?php

namespace App\Contracts;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface {
    public function getAll(): Collection;
    public function getById(string $id): User;
    public function create(UserDTO $user): User;
    public function update(UserDTO $user): User;
    public function delete(string $id): Bool;
}
