<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OrganigrammeController;
use App\Http\Controllers\EmployerFormationController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
    
    
    Route::middleware('auth')->group(function () {
        Route::get('leave/pendingLeave', [LeaveController::class, 'pendingLeave'])->name('leave.pendingLeave');
        Route::get('/leave/{leave}/approve', [LeaveController::class, 'approveLeave'])->name('leave.approve');
        Route::get('/leave/{leave}/reject', [LeaveController::class, 'rejectLeave'])->name('leave.reject');
        Route::get('/leave/{employer}/extractExtraTime', [EmployerController::class, 'extractExtraTime'])->name('employer.extractExtraTime');
        Route::post('employer/restoreAll', [EmployerController::class, 'restoreAll'])->name('employer.restore.all');
        Route::post('/department/restoreAll', [DepartmentController::class, 'restoreAll'])->name('departments.restore.all');
        Route::post('formations/restoreAll', [FormationController::class, 'restoreAll'])->name('formations.restore.all');
        Route::resource('department', DepartmentController::class);
        Route::resource('leave', LeaveController::class);
        // Route::get('leave/approveLeave', [LeaveController::class, 'approveLeave'])->name('leave.approveLeave');
        Route::resource('dashboard', DashboardController::class);
    Route::resource('employer', EmployerController::class);
    Route::resource('formation', FormationController::class);
    Route::resource('emploi', EmploiController::class);
    Route::resource('organigramme', OrganigrammeController::class);
    Route::resource('employerFormation', EmployerFormationController::class);
    Route::delete('employerFormation/{employerId}/{formationId}', [EmployerFormationController::class, 'destroy'])->name('employerFormation.destroy');
    Route::get('department/restore/one/{id}', [DepartmentController::class, 'restore'])->name('department.restore');


    
    
   
});

require __DIR__.'/auth.php';