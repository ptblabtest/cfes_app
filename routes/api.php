<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApprovalLogController;
use App\Http\Controllers\Api\SidebarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statuses', [ApprovalLogController::class, 'getStatuses']);
Route::get('/sidebar', [SidebarController::class, 'index']);
Route::get('/approval-logs/latest', [ApprovalLogController::class, 'fetchLatest']);
Route::post('/approval-logs/update', [ApprovalLogController::class, 'updateStatus']);

Route::get('/{entity}', [ApiController::class, 'index']);
Route::get('/{entity}/show/{id}', [ApiController::class, 'show']);
Route::patch('/{entity}/update/{id}', [ApiController::class, 'update']);
Route::post('/{entity}', [ApiController::class, 'store']);


