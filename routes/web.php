<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\QuestionnairesController;
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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/requirements', [PageController::class, 'requirements'])->name('requirements');
Route::get('/guides', [PageController::class, 'guides'])->name('guides');
Route::get('/documents', [PageController::class, 'documents'])->name('documents');
Route::get('/legislation', [PageController::class, 'legislation'])->name('legislation');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/questionnaires', [QuestionnairesController::class, 'index'])->name('questionnaires.index');
Route::get('/questionnaires/student', [QuestionnairesController::class, 'studentCreate'])->name('questionnaires.student.create');
Route::get('/questionnaires/company', [QuestionnairesController::class, 'companyCreate'])->name('questionnaires.company.create');
Route::get('/questionnaires/professor', [QuestionnairesController::class, 'professorCreate'])->name('questionnaires.professor.create');
Route::post('/questionnaires/student', [QuestionnairesController::class, 'studentStore'])->name('questionnaires.student.store');
Route::post('/questionnaires/company', [QuestionnairesController::class, 'companyStore'])->name('questionnaires.company.store');
Route::post('/questionnaires/professor', [QuestionnairesController::class, 'professorStore'])->name('questionnaires.professor.store');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/register/company', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/register/company', [CompanyController::class, 'store'])->name('company.register');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::patch('/company/{company}', [CompanyController::class, 'update'])->name('company.update')->middleware('auth');
Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy')->middleware('auth');
Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard')->middleware('auth');

Route::get('/companies/{company}/jobs', [JobController::class, 'index'])->name('companies.jobs.index')->middleware('auth');
Route::post('/companies/{company}/jobs', [JobController::class, 'store'])->name('companies.jobs.store')->middleware('auth');
Route::get('/companies/{company}/jobs/{job}', [JobController::class, 'show'])->name('companies.jobs.show');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy')->middleware('auth');

Route::get('/graduates', [GraduateController::class, 'index'])->name('graduates.index')->middleware(['auth','admin']);
Route::get('/register/graduate', [GraduateController::class, 'create'])->name('graduates.create');
Route::post('/register/graduate', [GraduateController::class, 'store'])->name('graduate.register');
Route::get('/graduate/{id}', [GraduateController::class, 'show'])->name('graduate.show');
Route::patch('/graduate/{id}', [GraduateController::class, 'update'])->name('graduate.update')->middleware(['auth','admin']);
Route::delete('/graduate/{id}', [GraduateController::class, 'destroy'])->name('graduate.destroy')->middleware(['auth','admin']);
Route::get('/graduates/map', [GraduateController::class, 'map'])->name('graduates.map');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/admin/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create')->middleware(['auth','admin']);
Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcement.store')->middleware(['auth','admin']);
Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/admin/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit')->middleware(['auth','admin']);
Route::patch('/admin/announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement.update')->middleware(['auth','admin']);
Route::delete('/admin/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy')->middleware(['auth','admin']);
Route::get('/announcements/download/file/{id}', [AnnouncementController::class, 'downloadFile'])->name('announcements.download.file');

Route::get('/trainees', [TraineeController::class, 'index'])->name('trainees.index')->middleware(['auth','admin']);
Route::get('/admin/trainee/create', [TraineeController::class, 'create'])->name('trainee.create')->middleware(['auth','admin']);
Route::post('/admin/trainees', [TraineeController::class, 'store'])->name('trainee.store')->middleware(['auth','admin']);
Route::get('/admin/trainee/{trainee}/edit', [TraineeController::class, 'edit'])->name('trainee.edit')->middleware(['auth','admin']);
Route::patch('/admin/trainee/{trainee}', [TraineeController::class, 'update'])->name('trainee.update')->middleware(['auth','admin']);
Route::delete('/admin/trainee/{trainee}', [TraineeController::class, 'destroy'])->name('trainee.destroy')->middleware(['auth','admin']);

Route::get('/stats/student', [StatisticsController::class, 'indexStudent'])->name('statistics.student');
Route::get('/stats/graduate', [StatisticsController::class, 'indexGraduate'])->name('statistics.graduate');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
