<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::get('/register/step1', [UserController::class, 'showRegister'])->name('register');
Route::post('/register/step1', [UserController::class, 'store']);
Route::get('/register/step2', [WeightController::class, 'showWeightRegister']);
Route::post('/register/step2', [WeightController::class, 'storeWeightRegister']);


Route::middleware('auth')->group(function () {

    Route::get('/weight_logs', [WeightController::class, 'showList']);
    Route::get('/weight_logs/goal_setting', [WeightController::class, 'showTargetWeight']);
    Route::patch('/weight_logs/goal_setting', [WeightController::class, 'updateTargetWeight']);
    Route::post('/weight_logs/search', [WeightController::class, 'search']);
    Route::post('/weight_logs/create', [WeightController::class, 'create']);
    Route::get('/weight_logs/{weightLogId}', [WeightController::class, 'detail']);
    Route::patch('/weight_logs/{weightLogId}/update', [WeightController::class, 'update']);
    Route::get('/weight_logs/{weightLogId}/delete', [WeightController::class, 'destroy']);
});
