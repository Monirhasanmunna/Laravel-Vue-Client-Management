<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClientController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified']],function(){
    Route::resource('service',ServiceController::class);
    Route::resource('client', ClientController::class);
    Route::resource('application', ApplicationController::class);
    Route::get('service-cost/{id}', [ApplicationController::class, 'getServiceCost'])->name('service.cost');
    Route::resource('reports/account', AccountController::class);
});



require __DIR__.'/auth.php';
