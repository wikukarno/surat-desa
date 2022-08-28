<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lurah\DashboardLurahController;
use App\Http\Controllers\Staff\DashboardStaffController;
use App\Http\Controllers\User\DashboardUserController;
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
        ->group(function(){
            Route::get('/', [DashboardLurahController::class, 'index'])->name('lurah.dashboard');
        });

Route::prefix('/pages/dashboard/staff')
        ->middleware(['auth', 'staff'])
        ->group(function(){
            Route::get('/', [DashboardStaffController::class, 'index'])->name('staff.dashboard');
        });

Route::prefix('/pages/dashboard/user')
        ->middleware(['auth', 'user'])
        ->group(function(){
            Route::get('/', [DashboardUserController::class, 'index'])->name('user.dashboard');
        });

Auth::routes();

