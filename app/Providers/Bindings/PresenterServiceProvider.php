<?php

namespace App\Providers\Bindings;

use App\Presenters\User\Contracts\ListPresenterInterface;
use App\Presenters\User\Contracts\PresenterInterface;
use App\Presenters\User\ListPresenter;
use App\Presenters\User\Presenter;
use Illuminate\Support\ServiceProvider;

class PresenterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ListPresenterInterface::class, ListPresenter::class);
        $this->app->bind(PresenterInterface::class, Presenter::class);
    }
}
