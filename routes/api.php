<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'employees' => EmployeeController::class,
]);
