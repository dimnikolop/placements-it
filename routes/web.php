<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Admin\AnnouncementController;

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

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/register/company', [CompanyController::class, 'create'])->name('company_register');
Route::post('/register/company', [CompanyController::class, 'store']);

Route::get('/register/graduate', [GraduateController::class, 'create'])->name('graduate_register');
Route::post('/register/graduate', [GraduateController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard')->middleware('auth');
Route::patch('/company/{company}', [CompanyController::class, 'update'])->name('company.update')->middleware('auth');
Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy')->middleware('auth');

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/admin/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create')->middleware(['auth','admin']);
Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcement.store')->middleware(['auth','admin']);
Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/admin/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit')->middleware(['auth','admin']);
Route::patch('/admin/announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement.update')->middleware(['auth','admin']);
Route::delete('/admin/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy')->middleware(['auth','admin']);
Route::get('/announcements/download/file/{id}', [AnnouncementController::class, 'downloadFile'])->name('announcements.download.file');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
