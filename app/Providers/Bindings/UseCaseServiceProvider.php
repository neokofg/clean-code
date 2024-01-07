<?php

namespace App\Providers\Bindings;

use App\UseCases\Auth\Contracts\RegisterUseCaseInterface;
use App\UseCases\Auth\RegisterUseCase;
use App\UseCases\User\Contracts\IndexUseCaseInterface;
use App\UseCases\User\Contracts\ShowUseCaseInterface;
use App\UseCases\User\IndexUseCase;
use App\UseCases\User\ShowUseCase;
use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IndexUseCaseInterface::class, IndexUseCase::class);
        $this->app->bind(ShowUseCaseInterface::class, ShowUseCase::class);
        $this->app->bind(RegisterUseCaseInterface::class, RegisterUseCase::class);
    }
}
