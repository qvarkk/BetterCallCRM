<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DealController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StatusController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'employees' => EmployeeController::class,
        'clients' => ClientController::class,
        'products' => ProductController::class,
        'deals' => DealController::class
    ]);

    Route::get('/statuses', [StatusController::class, 'index']);
    Route::get('/statuses/{status}', [StatusController::class, 'show']);
});
