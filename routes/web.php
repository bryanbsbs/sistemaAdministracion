<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\ProjectController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('providers', ProviderController::class);

Route::resource('costumers', CostumerController::class);

Route::resource('pays', PayController::class);

Route::resource('advances', AdvanceController::class);

Route::resource('projects', ProjectController::class);

