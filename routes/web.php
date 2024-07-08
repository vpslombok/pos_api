<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetpasswordController;
use App\Http\Controllers\EmailpresensiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// route reset password via aplikasi dan email
Route::get('/reset-password/{token}', [ResetpasswordController::class, 'showResetForm'])->name('reset.password');
Route::post('/reset-password', [ResetpasswordController::class, 'reset'])->name('kirim.data');
Route::get('/kirim-email', [EmailpresensiController::class, 'sendEmail']);