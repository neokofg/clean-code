<?php

namespace App\Presenters\User;

use App\DTO\User\Contracts\ResponseDTOInterface;
use App\Http\Resources\User\Resource;
use App\Presenters\User\Contracts\PresenterInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Presenter implements PresenterInterface
{
    public function present(ResponseDTOInterface $responseDTO): JsonResponse
    {
        return (new Resource($responseDTO->user))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}
