<?php

use Illuminate\Support\Facades\Route;
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
    Route::resource('department', DepartmentController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('employer', EmployerController::class);
    Route::resource('formation', FormationController::class);
    Route::resource('emploi', EmploiController::class);
    Route::resource('organigramme', OrganigrammeController::class);
    Route::resource('employerFormation', EmployerFormationController::class);
    Route::delete('employerFormation/{employerId}/{formationId}', [EmployerFormationController::class, 'destroy'])->name('employerFormation.destroy');
    Route::get('department/restore/one/{id}', [DepartmentController::class, 'restore'])->name('department.restore');
    Route::get('employer/restoreAll', [EmployerController::class, 'restoreAll'])->name('employer.restore.all');
    Route::get('/department/restoreAll', [DepartmentController::class, 'restoreAll'])->name('departments.restore.all');
    Route::get('formations/restoreAll', [FormationController::class, 'restoreAll'])->name('formations.restore.all');



    // Route::middleware('role:Admin|HR|Manager')->group(function(){
    //     Route::resource('grades', GradeController::class);
    // });
    
    // Route::middleware('role:Admin|HR')->group(function(){
    //     Route::resource('formation', FormationController::class);
    //     Route::resource('contrats', ContratController::class);
    //     // Route::resource('grades', GradeController::class);
    // });
    
    
    
    // Route::middleware('role:Admin')->group(function(){
    //     Route::resource('departments', DepartmentController::class);
    //     //  Route::resource('formations', FormationController::class);
    //     // Route::resource('contrats', ContratController::class);
    //     Route::resource('emplois', EmploiController::class);
    //     //  Route::resource('grades', GradeController::class);
    //     Route::put('/employes/{id}/update-partielle', [EmployeController::class, 'updatePartielle'])->name('employes.updatePartielle');
    //     Route::resource('employes', EmployeController::class);
    // });
});

require __DIR__.'/auth.php';