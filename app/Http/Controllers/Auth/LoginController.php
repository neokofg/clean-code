<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        return Auth::attempt($request->all()) ?
            response()->json(["token" => Auth::user()->createToken('auth-token')->plainTextToken]) :
            response()->json(["error" => "Неверные данные!"], 401);
    }
}
