<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\QAController;




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

Auth::routes();



Route::get('/{token}', [App\Http\Controllers\FirstController::class, 'index']);


Route::get('/login/{token}', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('/dash/firststep', [DashController::class, 'index'])->name('firststep');
Route::get('/dash/home', [DashController::class, 'home'])->name('twostep');
Route::get('/registration/{token}', [LoginController::class, 'registration'])->name('register-user');
Route::post('post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::post('checkin', [\App\Http\Controllers\DashController::class, 'checkin']);


Route::get('/dash/votefirst', [VoteController::class, 'index'])->name('votefirst');
Route::get('/dash/qafirst', [QAController::class, 'index'])->name('qafirst');

Route::get('/admin/login',[AuthLoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login',[AuthLoginController::class,'adminLogin'])->name('admin.login');


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    Route::resource('carosel', '\App\Http\Controllers\CaroselController');
    Route::resource('votes', '\App\Http\Controllers\VotesController');
    Route::resource('qac', '\App\Http\Controllers\QaController');
    Route::resource('users', '\App\Http\Controllers\NewController');
    Route::resource('contes', '\App\Http\Controllers\ContesController');

    Route::post('/uploadimage', [App\Http\Controllers\uploadController::class, 'upload']);
    Route::PATCH('sequence/up', [App\Http\Controllers\SequenceController::class, 'up']);

    Route::PATCH('sequence/down', [App\Http\Controllers\SequenceController::class, 'down']);
    Route::get('/logout', [AuthLoginController::class, 'perform'])->name('logout.perform');

});

