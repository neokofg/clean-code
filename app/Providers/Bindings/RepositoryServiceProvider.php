<?php

namespace App\Providers\Bindings;

use App\Models\User;
use App\Repositories\Auth\Contracts\LoginRepositoryInterface;
use App\Repositories\Auth\Contracts\RegisterRepositoryInterface;
use App\Repositories\Auth\LoginRepository;
use App\Repositories\Auth\RegisterRepository;
use App\Repositories\Criteria\Contracts\CriteriaApplierInterface;
use App\Repositories\Criteria\CriteriaApplier;
use App\Repositories\User\Contracts\IndexRepositoryInterface;
use App\Repositories\User\Contracts\ShowRepositoryInterface;
use App\Repositories\User\IndexRepository;
use App\Repositories\User\ShowRepository;
use App\UseCases\Auth\RegisterUseCase;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IndexRepositoryInterface::class, IndexRepository::class);
        $this->app->when(IndexRepository::class)
            ->needs(CriteriaApplierInterface::class)
            ->give(fn() => new CriteriaApplier(User::class));
        $this->app->bind(ShowRepositoryInterface::class, ShowRepository::class);
        $this->app->when(ShowRepository::class)
            ->needs(CriteriaApplierInterface::class)
            ->give(fn() => new CriteriaApplier(User::class));
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
    }
}
