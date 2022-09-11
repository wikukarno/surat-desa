<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lurah\DashboardLurahController;
use App\Http\Controllers\Lurah\SkuLurahController;
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\Staff\SkuStaffController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\SkuUserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/pages/dashboard/lurah')
    ->middleware(['auth', 'lurah'])
    ->group(function () {
        Route::get('/', [DashboardLurahController::class, 'index'])->name('lurah.dashboard');
        Route::get('/sku', [SkuLurahController::class, 'index'])->name('sku-lurah.index');
        Route::post('/sku/setujui/{id}', [SkuLurahController::class, 'update'])->name('sku-lurah.update');
    });

Route::prefix('/pages/dashboard/staff')
    ->middleware(['auth', 'staff'])
    ->group(function () {
        Route::get('/', [DashboardStaffController::class, 'index'])->name('staff.dashboard');

        Route::get('/sku', [SkuStaffController::class, 'index'])->name('sku-staff.index');
        Route::post('/sku/tolak-sku', [SkuStaffController::class, 'tolakSku'])->name('sku-staff.tolak');
        Route::post('/sku/teruskan/{id}', [SkuStaffController::class, 'update'])->name('sku-staff.update');

        Route::post('/sku/get-lampiran', [SkuStaffController::class, 'show'])->name('sku-staff.show');
    });

Route::prefix('/pages/dashboard/user')
    ->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/', [DashboardUserController::class, 'index'])->name('user.dashboard');
        Route::post('/sku/get-penolakan', [SkuUserController::class, 'getPenolakan'])->name('sku-user.get-penolakan');

        Route::resource('sku', SkuUserController::class);
    });

Auth::routes();
