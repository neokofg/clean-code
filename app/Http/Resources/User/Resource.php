<?php

namespace App\Http\Resources\User;

use App\Http\Resources\User\Enums\ResourceEnum;
use App\Models\Enums\UserColumn;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            ResourceEnum::Id->value => $this->getKey(),
            ResourceEnum::Name->value => $this->getColumn(UserColumn::Name),
            ResourceEnum::Email->value => $this->getColumn(UserColumn::Email),
            ResourceEnum::CreatedAt->value => $this->getColumn(UserColumn::CreatedAt)->format('d-m-Y H:i:s'),
            ResourceEnum::UpdatedAt->value => $this->getColumn(UserColumn::UpdatedAt)->format('d-m-Y H:i:s')
        ];
    }
}
