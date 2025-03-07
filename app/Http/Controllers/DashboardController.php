<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\emploi;
use App\Models\Employer;
use App\Models\Formation;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Notifications\MyNotification;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $emploiCount = emploi::count();
    $employerCount = Employer::count();
    $formationCount = Formation::count(); 
    $departmentCount = Department::count();

    $leaves = Leave::all();
    $user = auth()->user();
    foreach($leaves as $leave){
        if($leave->hr_approval == 'Pending'){
            if($user->roles->pluck('name')[0] == 'HR'){

                $alreadyNotified = $user->notifications()
                                    ->where('notifiable_id', auth()->user()->id)
                                    ->exists();

            if (!$alreadyNotified) {
                $user->notify(new MyNotification($leave));
            }

                }
        }

    }

    return view('dashboard', compact('emploiCount', 'employerCount', 'formationCount', 'departmentCount'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
