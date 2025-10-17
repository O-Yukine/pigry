<?php

use App\Http\Controllers\WeightController;
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

Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightController::class, 'showList']);
    Route::post('/weight_logs/create', [WeightController::class, 'create']);
    Route::get('/weight_logs/{weightLogId}', [WeightController::class, 'detail']);
    Route::patch('/weight_logs/{weightLogId}/update', [WeightController::class, 'update']);
    Route::get('/weight_logs/{weightLogId}/delete', [WeightController::class, 'destroy']);
});
