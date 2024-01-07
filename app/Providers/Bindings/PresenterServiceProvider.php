<?php

namespace App\Providers\Bindings;

use App\Presenters\Auth\Contracts\TokenPresenterInterface;
use App\Presenters\Auth\TokenPresenter;
use App\Presenters\User\Contracts\ListPresenterInterface as UserListPresenterInterface;
use App\Presenters\User\Contracts\PresenterInterface as UserPresenterInterface;
use App\Presenters\User\ListPresenter as UserListPresenter;
use App\Presenters\User\Presenter as UserPresenter;
use Illuminate\Support\ServiceProvider;

class PresenterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserListPresenterInterface::class, UserListPresenter::class);
        $this->app->bind(UserPresenterInterface::class, UserPresenter::class);
        $this->app->bind(TokenPresenterInterface::class, TokenPresenter::class);
    }
}
