<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employer;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\LeaveRequest;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employer= Employer::where('email', auth()->user()->email)->first();

        $leaves = Leave::whereHas('employer', function ($query) {
            $query->where('email', auth()->user()->email);
        })->get();

        return view('leave.index', compact('leaves','employer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (LeaveRequest $request)
    {
        if(auth()->user()->roles->pluck('name')[0] == 'HR'){

            $leave=array_merge($request->validated(), [
                'employer_id' => Employer::where('email', auth()->user()->email)->value('id'),
                'hr_approval' => 'Approved'
            ]);

        }elseif (auth()->user()->roles->pluck('name')[0] == 'Manager') {

            $leave=array_merge($request->validated(), [
                'employer_id' => Employer::where('email', auth()->user()->email)->value('id'),
                'manager_approval' => 'Approved'
            ]);

        }else{

            $leave=array_merge($request->validated(), [
                'employer_id' => Employer::where('email', auth()->user()->email)->value('id')
                
            ]);
        }
        Leave::create($leave);
        
        return redirect()->route('leave.index')
                         ->with('status', 'leave ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (LeaveRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route('leave.index')
                         ->with('status', 'Congé supprimée avec succès.');
    }

    public function pendingLeave()
    {

        $userRole = auth()->user()->roles->pluck('name')[0];
         $leaves = collect();

        if ($userRole == 'Manager') {
            $leaves = Leave::with('employer')->where('manager_approval', 'Pending')->where('statut', 'Pending')->get();

        //     $departmentId = auth()->user()->employer->department_id;

        // $leaves = Leave::whereHas('employer', function ($query) use ($departmentId) {
        //     $query->where('department_id', $departmentId);
        // })->where('manager_approval', 'Pending')->with('employer')->get();

        }
        
        if ($userRole == 'HR') {
            $leaves = Leave::with('employer')->where('hr_approval', 'Pending')->get();
        }
        
        return view('leave.pendingLeave',compact('leaves'));
    }

    public function approveLeave(Leave $leave)
    {

        $userRole = auth()->user()->roles->pluck('name')[0];

        if ($userRole == 'Manager' && $leave->manager_approval == 'Pending') {
            $leave->update(['manager_approval' => 'Approved']) ;
        }
    
        if ($userRole == 'HR'  && $leave->hr_approval == 'Pending') {
            $leave->update(['hr_approval' => 'Approved']);
        }

        if ($leave->hr_approval == 'Approved' && $leave->manager_approval == 'Approved'){
            $leave->update(['statut' => 'Approved']);

           $employer= Employer::where('id', $leave->employer_id)->first();
           $employer->leave_sold -= $leave->total_days;

           $employer->update(['leave_sold' => $employer->leave_sold]);
        }

        return redirect()->back()->with('success', 'Leave approved status updated successfully.');

    }

    public function rejectLeave(Leave $leave)
    {
        $userRole = auth()->user()->roles->pluck('name')[0];

        if ($userRole == 'Manager' && $leave->manager_approval == 'Pending') {
            $leave->update(['manager_approval' => 'Rejected','statut' => 'Rejected']);
        }
    
        if ($userRole == 'HR' && $leave->hr_approval == 'Pending') {
            $leave->update(['hr_approval' => 'Rejected']);
        }

        return redirect()->back()->with('success', 'Leave rejected status updated successfully.');

        
    }

   
}
