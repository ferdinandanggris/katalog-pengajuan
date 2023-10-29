<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if (Auth::check()) {
        return redirect()->route('approval.index');
    }
    return redirect()->route('login');
});

Auth::routes();
Route::post('/login', [LoginController::class, 'authenticated'])->name('login')->middleware('guest');

Route::resource('users', UserController::class)->name('*', 'users')->middleware('auth');
Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index')->middleware('auth');
Route::get('/approval/baru', [ApprovalController::class, 'baru'])->name('approval.baru')->middleware('auth');

Route::post('/approval/store-baru', [ApprovalController::class, 'storeBaru'])->name('approval.store-baru')->middleware('auth');
Route::post('/approval/store-modifikasi', [ApprovalController::class, 'storeModifikasi'])->name('approval.store-modifikasi')->middleware('auth');

Route::get('/approval/modifikasi', [ApprovalController::class, 'modifikasi'])->name('approval.modifikasi')->middleware('auth');
Route::get('/approval/{id}/export', [ApprovalController::class, 'export'])->name('approval.export')->middleware('auth');


Route::get('/about', function () {
    return view('about');
})->name('about');
