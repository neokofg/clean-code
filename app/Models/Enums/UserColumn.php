<?php

namespace App\Models\Enums;

use App\Models\Enums\Contracts\ModelColumnInterface;

enum UserColumn: string implements ModelColumnInterface
{
    case Id = 'id';
    case Name = 'name';
    case Email = 'email';

    case Password = 'password';
    case CreatedAt = 'created_at';
    case UpdatedAt = 'updated_at';
}
