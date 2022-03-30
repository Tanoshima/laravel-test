<?php

use App\Http\Controllers\HogeController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/slim', function (Request $request) {
    return new JsonResponse([
        'status' => 'ok'
    ], 200);
});

Route::get('/hoge', [HogeController::class, 'hoge']);
Route::get('/hoge/invoke', [HogeController::class, 'hoge']);
