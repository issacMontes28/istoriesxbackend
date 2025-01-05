<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlatformController;

Route::post('/generate-token', function (Request $request) {
    $user = User::find(1); // Replace with logic to find your user
    return $user->createToken('Test Token')->plainTextToken;
});

Route::resource('requests', RequestController::class);
//Route::resource('media', MediaController::class);
//Route::resource('platforms', PlatformController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/media', [MediaController::class, 'store']);
    Route::post('/platforms', [PlatformController::class, 'store']);
});