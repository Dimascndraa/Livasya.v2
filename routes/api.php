<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
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


Route::get('/categories', [CategoryApiController::class, 'getCategory']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::get('/categories/{category}', [CategoryApiController::class, 'show']);
Route::put('/categories/{category}', [CategoryApiController::class, 'update']);

Route::get('/posts', [PostApiController::class, 'getPost']);
Route::post('/posts', [PostApiController::class, 'store']);
Route::get('/posts/{post}', [PostApiController::class, 'show']);
Route::put('/posts/{post}', [PostApiController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
