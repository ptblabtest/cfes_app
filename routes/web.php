<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FindingController;
use App\Http\Controllers\HasOne\UserDetailController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    $user = auth()->user()->load('roles');
    return Inertia::render('Dashboard', [
        'auth' => ['user' => $user]
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard2', [DashboardController::class, 'dashboard2']);

Route::get('/f/{entity}', [FindingController::class, 'index'])->name('finding.index');

Route::get('/p/{entity}', [ProjectController::class, 'index'])->name('project.index');
Route::get('/p/{entity}/show/{id}', [ProjectController::class, 'show']);
Route::get('/p/{entity}/create', [ProjectController::class, 'create']);
Route::post('/p/{entity}', [ProjectController::class, 'store']);
Route::get('/p/{entity}/edit/{id}', [ProjectController::class, 'edit']);
Route::put('/p/{entity}/update/{id}', [ProjectController::class, 'update']);
Route::delete('/p/{entity}/{id}', [ProjectController::class, 'destroy']);


Route::get('/{entity}', [DisplayController::class, 'index'])->name('entity.index');
Route::get('/{entity}/show/{id}', [DisplayController::class, 'show'])->name('entity.show');
Route::get('/{entity}/create', [DisplayController::class, 'create']);
Route::post('/{entity}', [DisplayController::class, 'store']);
Route::get('/{entity}/edit/{id}', [DisplayController::class, 'edit'])->name('entity.edit');
Route::put('/{entity}/update/{id}', [DisplayController::class, 'update']);
Route::delete('/{entity}/{id}', [DisplayController::class, 'destroy']);

Route::get('/permissions', [PermissionController::class, 'index']);
Route::post('/permissions/change-role', [PermissionController::class, 'changeRole']);

Route::get('/d/{entity}/show/', [UserDetailController::class, 'show']);
Route::get('/d/{entity}/create/', [UserDetailController::class, 'create']);
Route::get('/d/{entity}/edit/{id}', [UserDetailController::class, 'edit']);
Route::put('/d/{entity}/update/{id}', [UserDetailController::class, 'update']);
