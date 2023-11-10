<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\UserSettingsController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard'); 

Route::get('grafico1', [AuthController::class, 'grafico1'])->name('grafico1'); 

Route::get('grafico2', [AuthController::class, 'grafico2'])->name('grafico2'); 

Route::get('grafico3', [AuthController::class, 'grafico3'])->name('grafico3'); 

Route::get('grafico4', [AuthController::class, 'grafico4'])->name('grafico4'); 

Route::get('grafico5', [AuthController::class, 'grafico5'])->name('grafico5'); 

Route::get('grafico6', [AuthController::class, 'grafico6'])->name('grafico6'); 

Route::get('perfil', [AuthController::class, 'perfil'])->name('perfil');

Route::get('/NewPassword',  [UserSettingsController::class,'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [UserSettingsController::class,'changePassword'])->name('changePassword');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
