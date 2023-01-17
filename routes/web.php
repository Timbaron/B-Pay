<?php

use App\Http\Controllers\Dashboard;
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
Route::get('Dashboard',[Dashboard::class,'index'])->name('dashboard');
Route::get('profile',[Dashboard::class,'profile'])->name('profile');
Auth::routes(['register' => false]);

// register route
Route::get('register/{affiliate_id?}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/find/account', [Dashboard::class, 'findAccount'])->name('find.account');
Route::post('transfer.initiate', [Dashboard::class, 'transferInitiate'])->name('transfer.initiate');

Route::get('activate/account/', [Dashboard::class, 'ActivateAccount'])->name('account.activate');
Route::get('/rave/callback', [Dashboard::class, 'callback'])->name('callback');
Route::post('/withdraw', [Dashboard::class, 'withdraw'])->name('withdraw');
