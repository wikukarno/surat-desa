<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lurah\DashboardLurahController;
use App\Http\Controllers\Lurah\ProfileLurahController;
use App\Http\Controllers\Lurah\SkpLurahController;
use App\Http\Controllers\Lurah\SktmLurahController;
use App\Http\Controllers\Lurah\SkuLurahController;
use App\Http\Controllers\Lurah\SuratLurahController;
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\Staff\ProfileStaffController;
use App\Http\Controllers\Staff\SkpStaffController;
use App\Http\Controllers\Staff\SktmStaffController;
use App\Http\Controllers\Staff\SkuStaffController;
use App\Http\Controllers\Staff\SuratStaffController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\SkpUserController;
use App\Http\Controllers\User\SktmUserController;
use App\Http\Controllers\User\SkuUserController;
use App\Http\Controllers\User\SuratUserController;
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
        Route::get('/sku', [SuratLurahController::class, 'index'])->name('sku-lurah.index');
        Route::post('/sku/setujui/{id}', [SuratLurahController::class, 'update'])->name('sku-lurah.update');
        Route::get('/skp', [SuratLurahController::class, 'skp'])->name('skp-lurah.index');
        Route::get('/sktm', [SuratLurahController::class, 'sktm'])->name('sktm-lurah.index');
        Route::get('/penduduk', [DataPendudukController::class, 'getPendudukLurah'])->name('lurah.data-penduduk.index');
        Route::get('/akun', [ProfileLurahController::class, 'index'])->name('lurah.akun');
        Route::post('/akun/update', [ProfileLurahController::class, 'update'])->name('lurah.update-akun');
        Route::post('/get-akun', [ProfileLurahController::class, 'show'])->name('lurah.get-akun');
        Route::post('/ubah-foto', [ProfileLurahController::class, 'ubahFoto'])->name('lurah.ubah-foto');
        Route::post('/sku/get-lampiran', [SuratLurahController::class, 'show'])->name('sku-lurah.show');
        Route::get('/laporan', [SuratLurahController::class, 'getLaporan'])->name('lurah.laporan');
    });

Route::prefix('/pages/dashboard/staff')
    ->middleware(['auth', 'staff'])
    ->group(function () {
        Route::get('/', [DashboardStaffController::class, 'index'])->name('staff.dashboard');

        Route::get('/sku', [SuratStaffController::class, 'index'])->name('sku-staff.index');
        Route::post('/sku/tolak-sku', [SuratStaffController::class, 'tolakSku'])->name('sku-staff.tolak');
        Route::post('/sku/teruskan/{id}', [SuratStaffController::class, 'update'])->name('sku-staff.update');
        Route::get('/penduduk', [DataPendudukController::class, 'getPendudukStaff'])->name('staff.data-penduduk.index');
        Route::get('/akun', [ProfileStaffController::class, 'index'])->name('staff.akun');
        Route::post('/akun/update', [ProfileStaffController::class, 'update'])->name('staff.update-akun');
        Route::post('/get-akun', [ProfileStaffController::class, 'show'])->name('staff.get-akun');
        Route::post('/ubah-foto', [ProfileStaffController::class, 'ubahFoto'])->name('staff.ubah-foto');

        Route::get('/skp', [SuratStaffController::class, 'skp'])->name('skp-staff.index');
        Route::get('/sktm', [SuratStaffController::class, 'sktm'])->name('sktm-staff.index');

        Route::post('/sku/get-lampiran', [SuratStaffController::class, 'show'])->name('sku-staff.show');
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

        Route::get('/sku', [SuratUserController::class, 'index'])->name('sku.index');
        Route::post('/sku/create', [SuratUserController::class, 'store'])->name('sku.store');
        Route::get('/skp', [SuratUserController::class, 'skp'])->name('skp.index');
        Route::get('/sktm', [SuratUserController::class, 'sktm'])->name('sktm.index');
    });

Auth::routes();
