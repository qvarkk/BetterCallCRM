<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'employees' => EmployeeController::class,
    'clients' => ClientController::class,
    'products' => ProductController::class,
]);
