<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/register', AuthController::class . "@registerView");

    Route::post('/register', AuthController::class . "@register")
        ->name('register.post');

    Route::get('/login', AuthController::class . "@loginView")
        ->name('login');

    Route::post('/login', AuthController::class . "@login")
        ->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/', function (Request $request) {
        return redirect(route('home'));
    });

    Route::post('/logout', AuthController::class . '@logout')
        ->name('logout');

    Route::get('/home', \App\Http\Controllers\HomeController::class . '@homeView')
        ->name('home');

    Route::post('/create-project', \App\Http\Controllers\ProjectsController::class . '@create')
        ->name('projects.post');

    Route::get('/projects/{id}', \App\Http\Controllers\ProjectsController::class . '@view')
        ->name('project');

    Route::post('/create-status-task', \App\Http\Controllers\StatusTaskController::class . '@create')
        ->name('status-task.post');

    Route::post('/create-task', \App\Http\Controllers\TasksController::class . '@create')
        ->name('create-task.post');

    Route::post('/add-user-project', \App\Http\Controllers\ProjectsController::class . '@addUser')
        ->name('add-user-project.post');

    Route::get('/task/{id}', \App\Http\Controllers\TasksController::class . '@view')
        ->name('task');

    Route::post('/task/update', \App\Http\Controllers\TasksController::class . '@update')
        ->name('update-task.post');

});
