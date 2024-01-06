<?php

namespace App\Http\Resources\User;

use App\Http\Resources\User\Enums\IndexResourceEnum;
use App\Models\Enums\UserColumn;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            IndexResourceEnum::Id->value => $this->getKey(),
            IndexResourceEnum::Name->value => $this->getColumn(UserColumn::Name),
            IndexResourceEnum::Email->value => $this->getColumn(UserColumn::Email),
        ];
    }
}
