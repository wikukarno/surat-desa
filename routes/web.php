<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lurah\DashboardLurahController;
use App\Http\Controllers\Lurah\SkpLurahController;
use App\Http\Controllers\Lurah\SktmLurahController;
use App\Http\Controllers\Lurah\SkuLurahController;
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\Staff\ProfileStaffController;
use App\Http\Controllers\Staff\SkpStaffController;
use App\Http\Controllers\Staff\SktmStaffController;
use App\Http\Controllers\Staff\SkuStaffController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\SkpUserController;
use App\Http\Controllers\User\SktmUserController;
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
        Route::get('/skp', [SkpLurahController::class, 'index'])->name('skp-lurah.index');
        Route::get('/sktm', [SktmLurahController::class, 'index'])->name('sktm-lurah.index');
    });

Route::prefix('/pages/dashboard/staff')
    ->middleware(['auth', 'staff'])
    ->group(function () {
        Route::get('/', [DashboardStaffController::class, 'index'])->name('staff.dashboard');

        Route::get('/sku', [SkuStaffController::class, 'index'])->name('sku-staff.index');
        Route::post('/sku/tolak-sku', [SkuStaffController::class, 'tolakSku'])->name('sku-staff.tolak');
        Route::post('/sku/teruskan/{id}', [SkuStaffController::class, 'update'])->name('sku-staff.update');
        Route::get('/penduduk', [DataPendudukController::class, 'index'])->name('data-penduduk.index');
        Route::get('/akun', [ProfileStaffController::class, 'index'])->name('staff.akun');
        Route::post('/akun/update', [ProfileStaffController::class, 'update'])->name('staff.update-akun');
        Route::post('/get-akun', [ProfileStaffController::class, 'show'])->name('staff.get-akun');
        Route::post('/ubah-foto', [ProfileStaffController::class, 'ubahFoto'])->name('staff.ubah-foto');

        Route::get('/skp', [SkpStaffController::class, 'index'])->name('skp-staff.index');
        Route::get('/sktm', [SktmStaffController::class, 'index'])->name('sktm-staff.index');

        Route::post('/sku/get-lampiran', [SkuStaffController::class, 'show'])->name('sku-staff.show');
        Route::get('/sku/cetak/{id}', [CetakController::class, 'cetak_sku'])->name('sku-staff.cetak-sku');
    });

Route::prefix('/pages/dashboard/user')
    ->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/', [DashboardUserController::class, 'index'])->name('user.dashboard');
        Route::post('/sku/get-penolakan', [SkuUserController::class, 'getPenolakan'])->name('sku-user.get-penolakan');

        Route::get('/akun', [ProfileUserController::class, 'index'])->name('user.akun');
        Route::post('/akun/update', [ProfileUserController::class, 'update'])->name('user.update-akun');
        Route::post('/get-akun', [ProfileUserController::class, 'show'])->name('user.get-akun');
        Route::post('/ubah-foto', [ProfileUserController::class, 'ubahFoto'])->name('user.ubah-foto');


        Route::resource('sku', SkuUserController::class);
        Route::resource('skp', SkpUserController::class);
        Route::resource('sktm', SktmUserController::class);
    });

Auth::routes();
