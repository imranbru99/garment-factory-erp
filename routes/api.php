<?php

use App\Http\Controllers\Api\V1\FactoryApiController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/webhooks', [FactoryApiController::class, 'webhook']);

Route::middleware(['auth:sanctum', 'throttle:api'])->prefix('v1')->group(function (): void {
    Route::get('/orders', [FactoryApiController::class, 'orders']);
    Route::post('/scans', [FactoryApiController::class, 'scan']);
    Route::post('/issues', [FactoryApiController::class, 'issue']);
});
