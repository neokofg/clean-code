<?php

namespace App\Http\Controllers\User;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function __invoke(UpdateRequest $request,string $id)
    {
        $userDTO = new UserDTO();
        $userDTO->fillForUpdate($id, $request->validated());
        return $this->userRepository->update($userDTO);
    }
}
