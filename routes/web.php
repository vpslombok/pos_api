<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetpasswordController;

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
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset.password');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('kirim.data');