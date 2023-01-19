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
use App\Http\Controllers\VoteetcController;



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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [App\Http\Controllers\FirstController::class, 'login'])->name('loginhome');

Route::get('/app/{token}', [App\Http\Controllers\FirstController::class, 'index']);

Route::get('/resetpassword', [App\Http\Controllers\ResetPasswordController::class, 'index']);
Route::POST('/resetpassword', [App\Http\Controllers\ResetPasswordController::class, 'store'])->name('reset.custom');
Route::get('qrcode', [App\Http\Controllers\QrcodeController::class, 'index']);
Route::get('/qalist/{id}', [App\Http\Controllers\QrcodeController::class, 'show']);

Auth::routes();



Route::get('/login/{token}', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/logout/logutfront', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout.front');

Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('/dash/firststep', [DashController::class, 'index'])->name('firststep');
Route::get('/dash/home', [DashController::class, 'home'])->name('twostep');
Route::get('/registration/{token}', [LoginController::class, 'registration'])->name('register-user');
Route::post('post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::post('checkin', [\App\Http\Controllers\DashController::class, 'checkin']);
Route::get('/dash/votefirst', [VoteController::class, 'index'])->name('votefirst');
Route::get('/dash/qafirst', [QAController::class, 'index'])->name('qafirst');
Route::post('saveqa', [QAController::class, 'store']);
Route::get('/admin/login',[AuthLoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login',[AuthLoginController::class,'adminLogin'])->name('admin.login');
Route::get('/vote/chud', [VoteetcController::class, 'chud'])->name('chud');
Route::post('savevote', [VoteetcController::class, 'store'])->name('savechud');
Route::get('/vote/idol', [VoteetcController::class, 'idol'])->name('idol');


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('carosel', '\App\Http\Controllers\CaroselController');
    Route::resource('votes', '\App\Http\Controllers\VotesController');
    Route::resource('setting/votess', '\App\Http\Controllers\VotesSettingController');
    Route::resource('setting/idol', '\App\Http\Controllers\VotesIdolController');
    Route::resource('setting/qac', '\App\Http\Controllers\QAsettingController');
    Route::resource('setting/qacsetting', '\App\Http\Controllers\SettingqaController');

    Route::resource('users', '\App\Http\Controllers\UserController');
    Route::resource('regis', '\App\Http\Controllers\SystemController');
    Route::post('users/datatables', [\App\Http\Controllers\UserController::class, 'getdatatable'])->name('users.data');

    Route::resource('contes', '\App\Http\Controllers\ContesController');

    Route::post('/uploadimage', [App\Http\Controllers\uploadController::class, 'upload']);
    Route::PATCH('sequence/up', [App\Http\Controllers\SequenceController::class, 'up']);

    Route::PATCH('sequence/down', [App\Http\Controllers\SequenceController::class, 'down']);
    Route::get('/logout', [AuthLoginController::class, 'perform'])->name('logout.perform');
    Route::POST('/reset', [App\Http\Controllers\ResetPasswordController::class, 'reset']);

    Route::get('/reporttotal', [App\Http\Controllers\ReportController::class, 'reporttotal']);
    Route::get('/reportfirst', [App\Http\Controllers\ReportController::class, 'reportfirst']);
    Route::get('/reportfirst/{id}', [App\Http\Controllers\ReportController::class, 'reportfirstshow']);
    Route::get('/reporttwo', [App\Http\Controllers\ReportController::class, 'reporttwo']);
    Route::get('/reporttwo/{id}', [App\Http\Controllers\ReportController::class, 'reporttwoshow']);
    Route::get('/reportqa', [App\Http\Controllers\ReportController::class, 'reportqa']);
    Route::get('/areportvoten', [App\Http\Controllers\ReportController::class, 'reportvoten']);
    Route::get('/bepvoted', [App\Http\Controllers\ReportController::class, 'reportvoted']);
    Route::get('export/{type}', [App\Http\Controllers\ReportController::class, 'export']);
    Route::get('exportqa/{type}', [App\Http\Controllers\ReportController::class, 'exportqa']);
    Route::get('exportvote/{type}', [App\Http\Controllers\ReportController::class, 'exportvote']);


});

