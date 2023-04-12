<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TimelogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Check in 
Route::get('/checkin', [CheckinController::class, 'index']);
Route::post('/checkin/submit', [CheckinController::class, 'submitCheckin']);

Route::get('/dashboard', [HomeController::class, 'dashboard']);

// Projects
Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/projects/create', [ProjectsController::class, 'createProject']);
Route::post('/projects/create/submit', [ProjectsController::class, 'submitCreateProject']);

// Tasks
Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/create', [TasksController::class, 'createTask']);
Route::POST('/tasks/create/submit', [TasksController::class, 'submitCreateTask']);

// TimeLog
Route::get('/timelog', [TimelogsController::class, 'index']);
Route::get('/timelog/create', [TimelogsController::class, 'createTimelog']);
Route::POST('/timelog/create/submit', [TimelogsController::class, 'submitCreateTimelog']);