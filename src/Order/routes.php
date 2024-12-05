<?php

use Illuminate\Support\Facades\Route;

Route::prefix('order-module')
    ->middleware(['api', 'auth:sanctum'])
    ->namespace('Module\Order\Application\Http\Controllers')
    ->group(function () {
        Route::apiResource('orders', OrderController::class);
    });
