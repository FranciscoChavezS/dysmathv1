<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SectionController;
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

Route::post('register', [RegisterController::class, 'store'])->name('api.v1.register');
Route::apiResource('categories', CategoryController::class)->names('api.v1.categories');
Route::apiResource('courses', CourseController::class)->names('api.v1.courses');
Route::apiResource('prices', PriceController::class)->names('api.v1.prices');
Route::apiResource('lessons', LessonController::class)->names('api.v1.lessons');
Route::apiResource('levels', LevelController::class)->names('api.v1.levels');
Route::apiResource('sections', SectionController::class)->names('api.v1.sections');
Route::apiResource('reviews', ReviewController::class)->names('api.v1.reviews');