<?php

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
    if(Auth::check()) {
        return redirect()->route('users.index');
    }
    return redirect()->route('login');
});

Auth::routes();

Route::resource('users', UserController::class)->name('*', 'users')->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticated'])->name('login')->middleware('guest');
// Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

// Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::put('/profile', 'ProfileController@update')->name('profile.update');


Route::get('/about', function () {
    return view('about');
})->name('about');
