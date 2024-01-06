<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Contracts\IndexRequestInterface;
use App\Presenters\User\Contracts\ListPresenterInterface;
use App\UseCases\User\Contracts\IndexUseCaseInterface;

final class IndexController extends Controller
{
    public function __construct(
        private IndexUseCaseInterface  $useCase,
        private ListPresenterInterface $presenter
    )
    {
    }
    public function __invoke(IndexRequestInterface $request): mixed
    {
        $requestDTO = $request->getValidated();

        $responseDTO = $this->useCase->execute($requestDTO);

        return $this->presenter->present($responseDTO);
    }
}
