<?php

namespace App\Http\Resources\User\Enums;
enum ResourceEnum: string
{
    case Id = 'id';
    case Name = 'name';
    case Email = 'email';
    case CreatedAt = 'created_at';
    case UpdatedAt = 'updated_at';
}
