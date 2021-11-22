<?php

use App\Http\Controllers\LeaderController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatisticController;
use App\Models\Statistic;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('players', PlayerController::class);
Route::resource('statistics', StatisticController::class);

Route::resource('leaders',LeaderController::class);