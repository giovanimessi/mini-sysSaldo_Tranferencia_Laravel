<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HistoricController;



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

Route::group(['middleware' => ['auth'], 'namespace'=>'Admin'], function (){

    Route::get('/admin', [AdminController::class, 'index'])->name('home');
    Route::get('/admin/balance', [BalanceController::class, 'index'])->name('saldo');
    Route::get('/admin/deposito', [BalanceController::class, 'create'])->name('deposito');
    Route::post('/admin/store', [BalanceController::class, 'store'])->name('store');


    Route::get('/admin/historico', [HistoricController::class, 'index'])->name('historico');




});

Route::get('/', [SiteController::class, 'index'])->name('site.home');

Auth::routes();

