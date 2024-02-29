<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [AuthController::class, 'login']);

/* Auth */
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginStore')->name('login.store');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerStore')->name('register.store');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::group(['middleware' => 'auth'], function () {
    /* Users */
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{user}', 'show')->name('show');
            Route::get('edit/{user}', 'edit')->name('edit');
            Route::put('update/{user}', 'update')->name('update');
            Route::delete('destroy/{user}', 'destroy')->name('destroy');
        });
    });

    /* Permissions */
    Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{permission}', 'edit')->name('edit');
            Route::put('update/{permission}', 'update')->name('update');
            Route::delete('destroy/{permission}', 'destroy')->name('destroy');
        });
    });

    /* Roles */
    Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function () {
        Route::middleware('role_or_permission:Admin')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('data_table', 'data_table')->name('data_table');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{role}', 'show')->name('show');
            Route::get('edit/{role}', 'edit')->name('edit');
            Route::put('update/{role}', 'update')->name('update');
            Route::delete('destroy/{role}', 'destroy')->name('destroy');
        });
    });

    /* Product */
    Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail', 'detail')->name('detail');
    });
    Route::controller(StoreController::class)->prefix('store')->name('store.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail', 'detail')->name('detail');
    });
    Route::controller(TransactionController::class)->prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail', 'detail')->name('detail');
    });
    Route::controller(MenuController::class)->prefix('menu')->name('menu.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail', 'detail')->name('detail');
        // Route::get('/detail/cart', 'cart')->name('cart');
        Route::get('/detail/checkout', 'checkout')->name('checkout');
    });

    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{orderId}', 'detail')->name('detail');
    });

    Route::controller(LaporanController::class)->prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{reportId}', 'detail')->name('detail');
        Route::get('/edit/{reportId}', 'edit')->name('edit');
    });
});
