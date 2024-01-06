<?php

namespace App\Models;

use App\Models\Enums\UserColumn;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;
    public const TABLE_NAME = 'users';
    protected $guarded = [
        UserColumn::Id->value,
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function getColumn(UserColumn $column): mixed
    {
        $attribute = $this->getColumns()[$column->value];
        return ($attribute->get)();
    }

    private function getColumns(): array
    {
        return [
            UserColumn::Name->value => new Attribute(
                get: fn(): string|null => $this->getAttribute(UserColumn::Name->value),
                set: fn(string|null $value) => $this->setAttribute(UserColumn::Name->value, $value)
            ),
            UserColumn::Email->value => new Attribute(
                get: fn(): string|null => $this->getAttribute(UserColumn::Email->value),
                set: fn(string|null $value) => $this->setAttribute(UserColumn::Email->value, $value)
            ),
            UserColumn::CreatedAt->value => new Attribute(
                get: fn(): Carbon => $this->getAttribute(UserColumn::CreatedAt->value),
                set: fn(string|null $value) =>  $this->setAttribute(UserColumn::CreatedAt->value, $value)
            ),
            UserColumn::UpdatedAt->value => new Attribute(
                get: fn(): Carbon => $this->getAttribute(UserColumn::UpdatedAt->value),
                set: fn(string|null $value) =>  $this->setAttribute(UserColumn::UpdatedAt->value, $value)
            ),
        ];
    }
}
