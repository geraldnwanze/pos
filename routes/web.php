<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
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

            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                Route::get('/', [AdminController::class, 'users'])->name('index');
                Route::get('create', [AdminController::class, 'createUser'])->name('create');
                Route::post('store', [AdminController::class, 'storeUser'])->name('store');
                Route::patch('status/toggle/{user}', [AdminController::class, 'toggleUserStatus'])->name('toggle-status');
                Route::get('{user}/edit', [AdminController::class, 'editUser'])->name('edit');
                Route::patch('{user}/update', [AdminController::class, 'updateUser'])->name('update');
                Route::patch('password/{user}/reset', [AdminController::class, 'resetUserPassword'])->name('reset-password');
            });

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

        // Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            // Route::get('/', [Produc::class, 'products'])->name('index');
            // Route::get('create', [Produc::class, 'createProduct'])->name('create');
            // Route::post('store', [Produc::class, 'storeProduct'])->name('store');
            // Route::get('{product}/edit', [Produc::class, 'editProduct'])->name('edit');
            // Route::patch('{product}/update', [Produc::class, 'updateProduct'])->name('update');
            Route::resource('products', ProductController::class);
        // });

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// Route::fallback(function () {
//     auth()->logout();
//     session()->regenerate();
//     return redirect()->route('index');
// });