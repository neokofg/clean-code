<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\RegisterRequestDTO;
use App\DTO\Auth\Contracts\RegisterRequestDTOInterface as UserDTO;
use App\Helpers\Contracts\RequestFilterHelperInterface;
use App\Http\Requests\Auth\Contracts\RegisterRequestInterface;
use App\Http\Requests\Enums\Auth\RegisterRequestParamEnum;
use App\Providers\Bindings\HelperServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest implements RegisterRequestInterface
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            RegisterRequestParamEnum::Name->value => 'required|string|max:32',
            RegisterRequestParamEnum::Email->value => 'required|string|email|max:256',
            RegisterRequestParamEnum::Password->value => 'required|string|max:64'
        ];
    }

    public function getValidated(): UserDTO
    {
        $requestParams = $this->validated();

        $filter = resolve(RequestFilterHelperInterface::class, [
           HelperServiceProvider::PARAM_REQUEST_PARAMS => $requestParams,
        ]);

        return new RegisterRequestDTO(
            $filter->checkRequestParam(RegisterRequestParamEnum::Name),
            $filter->checkRequestParam(RegisterRequestParamEnum::Email),
            $filter->checkRequestParam(RegisterRequestParamEnum::Password),
        );
    }
}
