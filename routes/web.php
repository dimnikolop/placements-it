<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;

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
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/', function() {
    return view('main.home');
})->name('home');

Route::get('/requirements', function() {
    return view('main.requirements');
})->name('requirements');

Route::get('/questionnaires', function() {
    return view('main.questionnaires');
})->name('questionnaires');

Route::get('/student_questionnaire', function() {
    return view('main.student_questionnaire');
})->name('student_questionnaire');

Route::get('/company_questionnaire', function() {
    return view('main.company_questionnaire');
})->name('company_questionnaire');

Route::get('/professor_questionnaire', function() {
    return view('main.professor_questionnaire');
})->name('professor_questionnaire');

Route::get('/company_register', function() {
    return view('main.company_register');
})->name('company_register');

Route::get('/graduate_register', function() {
    return view('main.graduate_register');
})->name('graduate_register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
