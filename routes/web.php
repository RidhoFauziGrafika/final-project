<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\admin\FieldController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KelolaUserController;
use App\Http\Controllers\admin\KelolaOrderController;



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
//     return view('welcome');
// });


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// middleware
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['role']], function () {
        // dashboard
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');
        Route::group(['prefix' => 'admin'], function () {
            Route::resource('field', FieldController::class)->middleware('auth')->except('show');
            Route::get('kelola-user', [KelolaUserController::class, 'index'])->middleware('auth');
            Route::delete('kelola-user/{id}', [KelolaUserController::class, 'destroy'])->name('kelola-user.destroy')->middleware('auth');
            Route::get('kelola-order', [KelolaOrderController::class, 'index'])->middleware('auth');
            Route::delete('kelola-order/{id}', [KelolaOrderController::class, 'destroy'])->name('kelola-order.destroy')->middleware('auth');
        });
    });
    Route::get('detail/{id}', [HomeController::class, 'detail']);
    Route::get('order/{id}', [OrderController::class, 'create']);
    Route::resource('order', OrderController::class);
});

// front end
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/orders', [HomeController::class, 'order']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/send-email', [SendEmailController::class, 'sendEmail'])->name('send.email');
