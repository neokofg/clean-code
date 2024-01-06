<?php

namespace App\DTO\User;

use App\DTO\PaginationDTO;
use App\DTO\User\Contracts\IndexRequestDTOInterface;

readonly class IndexRequestDTO implements IndexRequestDTOInterface
{
    public function __construct(
        public PaginationDTO $paginationDTO,
        public string|null $name = null,
        public string|null $email = null,
    )
    {
    }
}
