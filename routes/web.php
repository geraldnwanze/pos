<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\StaffController;
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

Route::view('/', 'auth.login')->name('index');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::as('dashboard.')->group(function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
        });
        Route::group(['prefix' => 'owner', 'as' => 'owner.'], function () {
            Route::get('/', [OwnerController::class, 'index'])->name('index');
        });
        Route::group(['prefix' => 'staff', 'as' => 'staff'], function () {
            Route::get('/', [StaffController::class, 'index'])->name('index');
        });
    });
});

// Route::fallback(function () {
//     auth()->logout();
//     session()->regenerate();
//     return redirect()->route('index');
// });