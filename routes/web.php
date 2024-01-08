<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AuthenticateUser;


    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginform');

    Route::middleware([AuthenticateUser::class])->group(function () {

        Route::get('/', [TaskController::class, 'index'])->name('task.index');
        Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/hobbies/{hobbyId}/edit', [TaskController::class, 'editHobby'])->name('tasks.hobbies.edit');
        Route::post('/tasks/hobbies/{hobbyId}/update', [TaskController::class, 'updateHobby'])->name('tasks.hobbies.update');
        Route::get('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
        Route::get('/tasks/soft-delete/{hobbyId}', [TaskController::class, 'softDeleteHobby'])->name('tasks.hobbies.softDelete');
        Route::get('/tasks/hobbies/{hobbyId}/hard-delete', [TaskController::class, 'hardDeleteHobby'])->name('tasks.hobbies.hardDelete');
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
        
    });

