<?php

namespace App\Presenters\Auth;

use App\Http\Resources\Auth\Resource;
use App\Presenters\Auth\Contracts\TokenPresenterInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TokenPresenter implements TokenPresenterInterface
{
    public function present(string $token): JsonResponse
    {
        return response()
            ->json(["token" => $token])
            ->setStatusCode(Response::HTTP_OK);
    }
}
