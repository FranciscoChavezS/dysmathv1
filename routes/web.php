<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\gameController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', HomeController::class)->name('home');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos',[CourseController::class,'index'])->name('courses.index');

Route::get('cursos/{course}',[CourseController::class,'show'])->name('courses.show');

Route::post('courses/{course}/enrolled',[CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('courses-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

Route::get('botman',[BotManController::class,'handle'])->name('handle');

Route::post('botman',[BotManController::class,'handle'])->name('handle');

Route::get('login/{driver}',[LoginController::class,'login']);

Route::get('login/{driver}/callback', [LoginController::class,'callback']);

Route::get('suma', [gameController::class, 'suma']);

Route::get('resta', [gameController::class, 'resta']);

Route::get('multi', [gameController::class, 'multi']);

Route::get('division', [gameController::class, 'division']);

Route::get('preguntas', [gameController::class, 'preguntas']);

Route::get('bingo', [gameController::class, 'bingo']);