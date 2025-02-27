<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Department;
use Spatie\Permission\Models\Role; 
use App\Http\Requests\EmployerRequest;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $employers = Employer::with('department')->paginate(10);
        return view('employer.index', [
            'employers' => $employers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $roles = Role::all();
        return view('employer.create' , compact('departments','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployerRequest $request)
    {
        Employer::create($request->validated());

        return redirect('/employer')->with('status','Employer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        $employer->load('department');
        return view('employer.show' , compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        $departments = Department::all();
        $roles = Role::all();
        return view('employer.edit' , compact('employer','departments','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerRequest $request, Employer $employer)
    {
        $employer->update($request->validated());
        return redirect('/employer')->with('status','Employer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return redirect('/employer')->with('status','Employer deleted successfully');
    }

    public function restoreAll()
    {
        Employer::onlyTrashed()->restore();
        return redirect('/employer')->with('status', 'Employer restored successfully');
    }
}
