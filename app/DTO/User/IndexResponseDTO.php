<?php

namespace App\DTO\User;

use App\DTO\User\Contracts\IndexResponseDTOInterface;
use Illuminate\Support\Collection;

readonly class IndexResponseDTO implements IndexResponseDTOInterface
{
    public function __construct(
        public Collection $collection,
        public int        $totalRowCount
    ) {
    }
}
