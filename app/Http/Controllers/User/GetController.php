<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\GetRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class GetController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function __invoke(string $id): User
    {
        return $this->userRepository->getById($id);
    }
}
