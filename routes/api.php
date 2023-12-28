<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\User\IndexController as UserI;
use App\Http\Controllers\User\GetController as UserG;
use App\Http\Controllers\User\UpdateController as UserU;
use App\Http\Controllers\User\DeleteController as UserD;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("v1")->group(function () {
   Route::prefix("auth")->group(function() {
       Route::post("register", RegisterController::class);
       Route::post("login", LoginController::class);
   });
   Route::prefix("user")->middleware(['auth:sanctum'])->group(function() {
       Route::get('/', UserI::class);
       Route::get('/{id}', UserG::class);
       Route::put('/{id}', UserU::class);
       Route::delete('/{id}', UserD::class);
   });
});
