<?php

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;

function checkPermission(User $user, string $permission, $model = null)
{
    if($user->cannot($permission, $model)) {
        throw new AuthorizationException();
    }
}
