<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\Pages\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        // Dashboard
        Route::get("/", [DashboardController::class, 'index'])->name("dashboard");

        // Category
        Route::get("/categories", [CategoryController::class, 'index'])->name("category.index");
        Route::get('/categories/checkSlug', [CategoryController::class, 'checkSlug']);
        Route::post("/categories", [CategoryController::class, 'store'])->name("category.create");
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

        // Users
        Route::get("/users", [UserController::class, 'index'])->name("user.index");
        Route::post("/users", [UserController::class, 'store'])->name("user.store");
        Route::put("/users/{users:id}", [UserController::class, 'update'])->name("user.update");
        Route::put('/user/{user:id}/akses', [UserController::class, 'akses'])->name('user.update.role');
        Route::put('/user/{user:id}/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/default-menu.php';
