<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'order' => OrderController::class,
]);