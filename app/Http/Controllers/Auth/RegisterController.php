<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Contracts\RegisterRequestInterface;
use App\Presenters\Auth\TokenPresenter;
use App\UseCases\Auth\Contracts\RegisterUseCaseInterface;

class RegisterController extends Controller
{
    public function __construct(
        private RegisterUseCaseInterface $useCase,
        private TokenPresenter $presenter,
    )
    {
    }
    public function __invoke(RegisterRequestInterface $request): mixed
    {
        $requestDTO = $request->getValidated();

        $responseDTO = $this->useCase->execute($requestDTO);

        return $this->presenter->present($responseDTO);
    }
}
