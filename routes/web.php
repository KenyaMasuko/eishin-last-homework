<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\OfferController;
use App\Http\Controllers\User\CandidateController;
use App\Http\Controllers\ChatController;
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
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('apply', CandidateController::class);

    Route::post('apply/{apply}', [ChatController::class, 'update'])->name('chat.store');
});

Route::resource('offers', OfferController::class);

require __DIR__ . '/auth.php';
