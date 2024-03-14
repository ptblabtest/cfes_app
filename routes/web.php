<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Function\ApprovalController;
use App\Http\Controllers\Function\ImportExcelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisplayController;

use App\Http\Controllers\Admin\PermissionController;

// Routes that do not require authentication
Route::get('/', function () {
    return redirect('/dashboard');
});

require __DIR__ . '/auth.php'; // Assuming this is where your authentication routes are defined

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user()->load('roles');
        return Inertia::render('Dashboard', [
            'auth' => ['user' => $user]
        ]);
    })->middleware(['verified'])->name('dashboard');

    Route::post('/import/{entity}', [ImportExcelController::class, 'import'])->name('entity.import');
    Route::get('/import', [ImportExcelController::class, 'showImportPage'])->name('import.page');
    Route::get('/export/{entity}', [ImportExcelController::class, 'export'])->name('entity.export');
    Route::post('/update-status/{entity}', [ApprovalController::class, 'updateStatus'])->name('entity.update-status');

    Route::get('/dashboard1', function () {
        return Inertia::render('Dashboard/Dashboard1', [
            'auth' => ['user' => auth()->user()->load('roles')],
        ]);
    })->middleware(['verified'])->name('dashboard1');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard2', [DashboardController::class, 'dashboard2']);

    Route::get('/{entity}', [DisplayController::class, 'index'])->name('entity.index');
    Route::get('/{entity}/show/{id}', [DisplayController::class, 'show'])->name('entity.show');
    Route::get('/{entity}/create', [DisplayController::class, 'create']);
    Route::post('/{entity}', [DisplayController::class, 'store']);
    Route::get('/{entity}/edit/{id}', [DisplayController::class, 'edit'])->name('entity.edit');
    Route::put('/{entity}/update/{id}', [DisplayController::class, 'update']);
    Route::delete('/{entity}/{id}', [DisplayController::class, 'destroy']);

    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::post('/permissions/change-role', [PermissionController::class, 'changeRole']);
});
