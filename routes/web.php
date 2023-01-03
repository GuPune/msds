<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{token}', [App\Http\Controllers\FirstController::class, 'index']);


Route::get('/login/{token}', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('/dash/firststep', [DashController::class, 'index'])->name('firststep');
Route::get('/dash/home', [DashController::class, 'home'])->name('twostep');
Route::get('/registration/{token}', [LoginController::class, 'registration'])->name('register-user');
Route::post('post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::post('checkin', [\App\Http\Controllers\DashController::class, 'checkin']);
