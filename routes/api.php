<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DealController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StatusController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'employees' => EmployeeController::class,
    'clients' => ClientController::class,
    'products' => ProductController::class,
    'deals' => DealController::class
]);

Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{status}', [StatusController::class, 'show']);
