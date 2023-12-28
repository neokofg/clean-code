<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function __invoke(RegisterRequest $request)
    {
        $userDTO = new UserDTO();
        $userDTO->fillForCreation(
            $request->name,
            $request->email,
            $request->password
        );
        $user = $this->userRepository->create($userDTO);

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(["token" => $token]);
    }
}
