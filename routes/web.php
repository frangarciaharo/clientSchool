<?php

use App\Http\Controllers\Auth\Register;
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


Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [Register::class, 'store']);

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
Route::delete('/teachers/{code}', [TeachersController::class, 'delete']);
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/create', [StudentsController::class, 'create']);
Route::post('/students', [StudentsController::class, 'store']);
Route::get('/students/{code}', [StudentsController::class, 'show']);
Route::get('/students/{code}/edit', [StudentsController::class, 'edit']);
Route::put('/students/{code}', [StudentsController::class, 'update']);
Route::delete('/students/{code}', [StudentsController::class, 'delete']);
Route::get('/courses', [CoursesController::class, 'index']);
Route::get('/courses/create', [CoursesController::class, 'create']);
Route::post('/courses', [CoursesController::class, 'store']);
Route::get('/courses/{code}', [CoursesController::class, 'show']);
Route::get('/courses/{code}/edit', [CoursesController::class, 'edit']);
Route::put('/courses/{code}', [CoursesController::class, 'update']);
Route::delete('/courses/{code}', [CoursesController::class, 'delete']);
Route::get('/subjects', [SubjectsController::class, 'index']);
Route::get('/subjects/create', [SubjectsController::class, 'create']);
Route::post('/subjects', [SubjectsController::class, 'store']);
Route::get('/subjects/{code}', [SubjectsController::class, 'show']);
Route::get('/subjects/{code}/edit', [SubjectsController::class, 'edit']);
Route::put('/subjects/{code}', [SubjectsController::class, 'update']);
Route::delete('/subjects/{code}', [SubjectsController::class, 'delete']);