<?php

use App\Http\Controllers\API\V1\AirDuctsController;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\DryerVentsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('user-details', [AuthController::class, 'userDetails'])->name('user-details');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::apiResource('air-ducts', AirDuctsController::class);
        Route::apiResource('dryer-vents', DryerVentsController::class);
        Route::get('business-rules', [AirDuctsController::class, 'businessRules'])->name('business-rules');
    });
});
