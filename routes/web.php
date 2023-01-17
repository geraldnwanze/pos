<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
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

        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
        });

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::patch('status/toggle/{user}', [UserController::class, 'toggleStatus'])->name('toggle-status');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('{user}/update', [UserController::class, 'update'])->name('update');
            Route::patch('password/{user}/reset', [UserController::class, 'resetPassword'])->name('reset-password');
            Route::delete('{user}/delete', [UserController::class, 'destroy'])->name('delete');
        });

        Route::resource('cart', CartController::class);
        Route::resource('sales', SaleController::class);

        Route::get('settings', [UserController::class, 'settings'])->name('settings');
        Route::patch('update/{user}/password', [UserController::class, 'updatePassword'])->name('update-password');

        Route::resource('products', ProductController::class);

        Route::get('profile', [UserController::class, 'profile'])->name('profile');

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// Route::fallback(function () {
//     auth()->logout();
//     session()->regenerate();
//     return redirect()->route('index');
// });