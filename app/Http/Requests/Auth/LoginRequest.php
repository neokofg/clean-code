<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\Contracts\LoginRequestDTOInterface;
use App\DTO\Auth\LoginRequestDTO;
use App\Helpers\Contracts\RequestFilterHelperInterface;
use App\Http\Requests\Auth\Contracts\LoginRequestInterface;
use App\Http\Requests\Enums\Auth\LoginRequestParamEnum;
use App\Providers\Bindings\HelperServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest implements LoginRequestInterface
{
    public function rules(): array
    {
        return [
            LoginRequestParamEnum::Email->value => 'required|string|max:256|email',
            LoginRequestParamEnum::Password->value => 'required|string|max:64'
        ];
    }

    public function getValidated(): LoginRequestDTOInterface
    {
        $requestParams = $this->validated();

        $filter = resolve(RequestFilterHelperInterface::class, [
            HelperServiceProvider::PARAM_REQUEST_PARAMS => $requestParams,
        ]);

        return new LoginRequestDTO(
            $filter->checkRequestParam(LoginRequestParamEnum::Email),
            $filter->checkRequestParam(LoginRequestParamEnum::Password)
        );
    }
}
