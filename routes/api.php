<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail']);
Route::post('password/reset', [ResetPassword::class,'reset'])->name('password.reset');

Route::post('/register', [RegisterController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('health-check', function () {
    return response()->json([
        'message' => 'Api acessada com sucesso'
    ], Response::HTTP_OK);
});
