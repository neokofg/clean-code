<?php

namespace App\Presenters\User;

use App\DTO\User\Contracts\IndexResponseDTOInterface;
use App\Http\Resources\User\IndexResource;
use App\Presenters\User\Contracts\ListPresenterInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListPresenter implements ListPresenterInterface
{
    public const HEADER_X_TOTAL_COUNT = 'X-Total-Count';

    public function present(IndexResponseDTOInterface $responseDTO): JsonResponse
    {
        return IndexResource::collection($responseDTO->collection)
            ->response()
            ->header(self::HEADER_X_TOTAL_COUNT, $responseDTO->totalRowCount)
            ->setStatusCode(Response::HTTP_OK);
    }
}

