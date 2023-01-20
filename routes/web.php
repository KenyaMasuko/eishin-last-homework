<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// ここから追加
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin-login');
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin-register');

Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');

// company
Route::get('/login/company', [App\Http\Controllers\Auth\LoginController::class, 'showCompanyLoginForm']);
Route::get('/register/company', [App\Http\Controllers\Auth\RegisterController::class, 'showCompanyRegisterForm']);

Route::post('/login/company', [App\Http\Controllers\Auth\LoginController::class, 'companyLogin'])->name('company-login');
Route::post('/register/company', [App\Http\Controllers\Auth\RegisterController::class, 'registerCompany'])->name('company-register');

Route::view('/company', 'company')->middleware('auth:company')->name('company-home');
