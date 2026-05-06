<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SubjectsController;

Route::get('/', function () {
    return view('dashboard');
});

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/create', [UsersController::class, 'create']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
Route::put('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'delete']);;
Route::get('/teachers', [TeachersController::class, 'index']);
Route::get('/teachers/create', [TeachersController::class, 'create']);
Route::post('/teachers', [TeachersController::class, 'store']);
Route::get('/teachers/{code}', [TeachersController::class, 'show']);
Route::get('/teachers/{code}/edit', [TeachersController::class, 'edit']);
Route::put('/teachers/{code}', [TeachersController::class, 'update']);
Route::delete('/teachers/{code}', [TeachersController::class, 'delete']);;
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/courses', [CoursesController::class, 'index']);
Route::get('/subjects', [SubjectsController::class, 'index']);