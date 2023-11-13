<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\YourPostController;
use App\Http\Controllers\TopupController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/mode', function () {
    return view('backup');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/posting', function () {
    return view('posting');
});


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('auth');

Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/welcome');
})->name('logout');


Route::get('/search', 'SearchController@index');

Route::post('/posting/store',[PostController::class,'store']);

Route::get('/donationPage', function () {
    return view('donationPage');
}); 
Route::get('/donationPage/{id}',[SearchController::class,'edit']);

Route::post('/donate', [PostController::class, 'donate'])->name('donate');
Route::post('/topup', [TopupController::class, 'topup'])->name('topup');

Route::post('/donationPage/{id}/store',[KomentarController::class,'store']);

Route::post('/testing/store',[KomentarController::class,'store']);

Route::get('/donationPage/{id}', [KomentarController::class, 'index']);
Route::get('/postinganuser/{id}', [YourPostController::class, 'index']);

Route::get('/postinganuser/{id}', 'YourPostController@index');
Route::get('/delete/{id}',[PostController::class,'destroy']);
