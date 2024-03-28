<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApprovalLogController;
use App\Http\Controllers\Api\SidebarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sidebar', [SidebarController::class, 'getSidebar']);
Route::get('/{entity}', [ApiController::class, 'getItems']);
Route::get('/{entity}/show/{id}', [ApiController::class, 'getItem']);

Route::get('/statuses', [ApprovalLogController::class, 'getStatuses']);

Route::get('/approval-logs/latest', [ApprovalLogController::class, 'fetchLatest']);
Route::post('/approval-logs/update', [ApprovalLogController::class, 'updateStatus']);
