<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\MyCoursesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home/Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::prefix('/courses')->name('courses')->group(function () {
    Route::get('/', [CoursesController::class, 'search'])->name('.search');

    Route::get('/{slug}/watch', [CoursesController::class, 'watch'])->name('.watch')->middleware('auth:sanctum');

    Route::get('/{slug}', [CoursesController::class, 'show'])->name('.show');

    Route::post('/subscribe', [CoursesController::class, 'subscribe'])->name('.subscribe')->middleware('auth:sanctum');

    Route::post('/unsubscribe', [CoursesController::class, 'unsubscribe'])->name('.unsubscribe')->middleware('auth:sanctum');
});

Route::prefix('/my-courses')->name('my-courses')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [MyCoursesController::class, 'index'])->name('.index');
});

Route::get('/get-course/{id}', 'App\Http\Controllers\Api\Classes\ClassesController@getClasses')->name('get-course');
