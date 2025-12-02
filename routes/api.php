<?php

use App\Http\Controllers\Api\V1\PickupController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\WasteTypeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::prefix('v1')->group(function () {


    //     Route::singleton('profile', ProfileController::class)
    //         ->creatable();


    //     Route::apiResource('pickup', PickupController::class);
    // });


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::post('/profile/avatar', [ProfileController::class, 'uploadAvatar']);
    // Route::post('/profile', [ProfileController::class, 'update']);

    Route::post('/pickups', [PickupController::class, 'store']);
    Route::get('/pickups', [PickupController::class, 'index']);
    Route::get('/pickups/{id}', [PickupController::class, 'show']);


    Route::get('/waste-categories', [WasteTypeCategory::class, 'index']);
    Route::get('/waste-categories/{id}', [WasteTypeCategory::class, 'show']);
});

require __DIR__ . '/auth.php';
