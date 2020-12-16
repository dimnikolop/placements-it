<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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

Route::get('/welcome', function () {
    return view('welcome');
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

Route::get('/questionnaires/student', function() {
    return view('main.student_questionnaire');
})->name('student_questionnaire');

Route::get('/questionnaires/company', function() {
    return view('main.company_questionnaire');
})->name('company_questionnaire');

Route::get('/questionnaires/professor', function() {
    return view('main.professor_questionnaire');
})->name('professor_questionnaire');

Route::get('/register/company', [CompanyController::class, 'create'])->name('company_register');
Route::post('/register/company', [CompanyController::class, 'store']);

Route::get('/register/graduate', [GraduateController::class, 'create'])->name('graduate_register');
Route::post('/register/graduate', [GraduateController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard')->middleware('auth');
Route::patch('/company/{company}', [CompanyController::class, 'update'])->name('company.update')->middleware('auth');
Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy')->middleware('auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
