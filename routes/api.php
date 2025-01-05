<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlatformController;

Route::middleware('auth:sanctum')->get('/test-auth', function (Request $request) {
    return response()->json(['user' => $request->user()]);
});

Route::post('/generate-token', function (Request $request) {
    $user = User::find(1); // TODO: add more robust logic
    $token = $user->createTokenWithExpiry('Test Token');

    return response()->json([
        'token' => $token->plainTextToken,
    ]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/media', [MediaController::class, 'store']);
    Route::post('/platforms', [PlatformController::class, 'store']);
    Route::resource('requests', RequestController::class);
    //Route::resource('media', MediaController::class);
    //Route::resource('platforms', PlatformController::class);
});