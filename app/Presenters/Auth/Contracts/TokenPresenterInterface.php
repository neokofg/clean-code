<?php

namespace App\Presenters\Auth\Contracts;

interface TokenPresenterInterface
{
    public function present(String $token): mixed;
}
