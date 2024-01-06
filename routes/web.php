<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DisplayController;


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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/{entity}/create', [DisplayController::class, 'create']);
        Route::post('/{entity}', [DisplayController::class, 'store']);
        Route::get('/{entity}/edit/{id}', [DisplayController::class, 'edit']);
        Route::put('/{entity}/update/{id}', [DisplayController::class, 'update']);
        Route::delete('/{entity}/{id}', [DisplayController::class, 'destroy']);
        Route::get('/{entity}/export', [DisplayController::class, 'export']);
        Route::post('/{entity}/import', [DisplayController::class, 'import']);
    });

    // Routes accessible by 'admin' and 'guest'
    Route::get('/{entity}', [DisplayController::class, 'index'])->name('entity.index');
    Route::get('/{entity}/show/{id}', [DisplayController::class, 'show']);
});




