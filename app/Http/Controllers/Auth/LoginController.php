<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Contracts\LoginRequestInterface;
use App\Presenters\Auth\Contracts\TokenPresenterInterface;
use App\UseCases\Auth\Contracts\LoginUseCaseInterface;

class LoginController extends Controller
{
    public function __construct(
        private LoginUseCaseInterface $useCase,
        private TokenPresenterInterface $presenter,
    )
    {
    }
    public function __invoke(LoginRequestInterface $request)
    {
        $requestDTO = $request->getValidated();

        $responseDTO = $this->useCase->execute($requestDTO);

        return $this->presenter->present($responseDTO);
    }
}
