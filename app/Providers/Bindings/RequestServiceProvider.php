<?php

namespace App\Providers\Bindings;

use App\Http\Requests\Auth\Contracts\RegisterRequestInterface;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\Contracts\IndexRequestInterface;
use App\Http\Requests\User\IndexRequest;
use Illuminate\Support\ServiceProvider;

class RequestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IndexRequestInterface::class, IndexRequest::class);
        $this->app->bind(RegisterRequestInterface::class, RegisterRequest::class);
    }
}
