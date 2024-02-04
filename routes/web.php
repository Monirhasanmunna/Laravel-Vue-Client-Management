<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DueCollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Report\AccountController;
use App\Http\Controllers\ServiceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest');



Route::group(['middleware' => ['auth', 'verified']],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('service',ServiceController::class);
    Route::resource('client', ClientController::class);
    Route::resource('application', ApplicationController::class);
    Route::get('service-cost/{id}', [ApplicationController::class, 'getServiceCost'])->name('service.cost');
    Route::resource('reports/account', AccountController::class);

    Route::group(['as'=>'collection.', 'prefix'=>'collection'],function(){
        Route::get('/due',[DueCollectionController::class,'index'])->name('index');
        Route::get('/due/{id}',[DueCollectionController::class,'getApplicationById'])->name('get-application');
        Route::post('/due-payment',[DueCollectionController::class,'duePayment'])->name('due-payment');
    });
});



require __DIR__.'/auth.php';
