<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Presenters\User\Contracts\PresenterInterface;
use App\UseCases\User\Contracts\ShowUseCaseInterface;
use Illuminate\Http\Request;

final class ShowController extends Controller
{
    public function __construct(
        private ShowUseCaseInterface $useCase,
        private PresenterInterface $presenter
    )
    {

    }

    public function __invoke(string $id): mixed
    {
        $response = $this->useCase->execute($id);
        return $this->presenter->present($response);
    }
}
