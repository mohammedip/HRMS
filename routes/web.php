<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\DepartmentController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::middleware('auth')->group(function () {
    Route::resource('department', DepartmentController::class);
    Route::resource('employer', EmployerController::class);
    Route::resource('formation', FormationController::class);
    Route::resource('emploi', EmploiController::class);
    Route::get('department/restore/one/{id}', [DepartmentController::class, 'restore'])->name('department.restore');
    Route::get('employer/restoreAll', [EmployerController::class, 'restoreAll'])->name('employer.restore.all');
    Route::get('/department/restoreAll', [DepartmentController::class, 'restoreAll'])->name('departments.restore.all');
    Route::get('formations/restoreAll', [FormationController::class, 'restoreAll'])->name('formations.restore.all');

    
});

require __DIR__.'/auth.php';