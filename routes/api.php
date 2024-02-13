<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApprovalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth'])->group(function () {
    Route::get('/{entity}', [ApiController::class, 'index']);
    Route::get('/{entity}/{id}', [ApiController::class, 'show']);
});
