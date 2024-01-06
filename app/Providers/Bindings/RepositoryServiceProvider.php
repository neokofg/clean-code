<?php

namespace App\Providers\Bindings;

use App\Models\User;
use App\Repositories\Criteria\Contracts\CriteriaApplierInterface;
use App\Repositories\Criteria\CriteriaApplier;
use App\Repositories\User\Contracts\IndexRepositoryInterface;
use App\Repositories\User\IndexRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IndexRepositoryInterface::class, IndexRepository::class);
        $this->app->when(IndexRepository::class)
            ->needs(CriteriaApplierInterface::class)
            ->give(fn() => new CriteriaApplier(User::class));
    }
}
