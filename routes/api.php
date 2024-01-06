<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\User\IndexController as UserI;
use App\Http\Controllers\User\ShowController as UserS;

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
       Route::get('/{id}', UserS::class);
       Route::put('/{id}', );
       Route::delete('/{id}', );
   });
   Route::prefix("posts")->group(function() {
       Route::get('/');
   });
});
