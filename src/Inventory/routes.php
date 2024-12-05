<?php

use Illuminate\Support\Facades\Route;

Route::prefix('inventory-module')
    ->middleware(['api', 'auth:sanctum'])
    ->namespace('Module\Inventory\Application\Http\Controllers')
    ->group(function () {
        Route::apiResource('products', ProductController::class);
    });
