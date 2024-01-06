<?php

namespace App\Http\Requests\User;

use App\DTO\PaginationDTO;
use App\DTO\User\IndexRequestDTO;
use App\DTO\User\IndexRequestDTO as UserIndexRequestDTO;
use App\Enums\SortTypeEnum;
use App\Helpers\Contracts\EnumHelperInterface;
use App\Helpers\Contracts\RequestFilterHelperInterface;
use App\Http\Requests\Enums\PaginationEnum;
use App\Http\Requests\Enums\User\IndexRequestParamEnum;
use App\Http\Requests\User\Contracts\IndexRequestInterface;
use App\Models\Enums\UserColumn;
use App\Models\User;
use App\Providers\Bindings\HelperServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest implements IndexRequestInterface
{
    public function rules(): array
    {
        $enumHelper = resolve(EnumHelperInterface::class);

        return [
            PaginationEnum::Start->value => 'required|integer|min:0',
            PaginationEnum::End->value => 'required|integer|min:1',
            PaginationEnum::SortColumn->value =>
                'required|string|in:' . $enumHelper->serialize(UserColumn::class),
            PaginationEnum::SortType->value =>
                'required|string|in:' . $enumHelper->serialize(SortTypeEnum::class),
            PaginationEnum::Ids->value =>
                'sometimes|required|array|exists:' . User::TABLE_NAME . ',' . UserColumn::Id->value,
            PaginationEnum::Ids->value . '.*' => 'required|integer|min:1',
            IndexRequestParamEnum::Name->value => 'sometimes|required|string',
            IndexRequestParamEnum::Email->value => 'sometimes|required|string|email'
        ];
    }

    public function getValidated(): UserIndexRequestDTO
    {
        $requestParams = $this->validated();

        $filter = resolve(RequestFilterHelperInterface::class, [
            HelperServiceProvider::PARAM_REQUEST_PARAMS => $requestParams,
        ]);

        $paginationDTO = new PaginationDTO(
            $requestParams[PaginationEnum::Start->value],
            $requestParams[PaginationEnum::End->value],
            UserColumn::from($requestParams[PaginationEnum::SortColumn->value]),
            SortTypeEnum::from($requestParams[PaginationEnum::SortType->value]),
            $filter->checkRequestParam(PaginationEnum::Ids),
        );

        return new IndexRequestDTO(
            $paginationDTO,
            $filter->checkRequestParam(IndexRequestParamEnum::Name),
            $filter->checkRequestParam(IndexRequestParamEnum::Email),
        );
    }
}
