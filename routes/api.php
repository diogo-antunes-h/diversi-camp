<?php

use App\Http\Controllers\CreateLessonCommentController;
use App\Http\Controllers\GetLessonCommentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'lesson',
    'as' => 'lesson.',
], function () {
    Route::post('/add-comment', CreateLessonCommentController::class)->name('add-comment');
    Route::post('/get-comments/{lessonId}', GetLessonCommentController::class)->name('get-comment');
});
