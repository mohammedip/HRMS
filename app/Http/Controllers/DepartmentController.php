<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Employer;
use App\Http\Requests\departmentRequest;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('responsable')->paginate(10);
        return view('department.index', [
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $managers = Employer::whereHas('role', function ($query) {
            $query->where('name', 'Manager');
        })->get();
        return view('department.create' , compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(departmentRequest $request)
    {
        
        Department::create($request->validated());

        return redirect('/department')->with('status','Department created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        $department->load('responsable');
        return view('department.show' , compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        $managers = Employer::whereHas('role', function ($query) {
            $query->where('name', 'Manager');
        })->get();
        return view('department.edit' , compact('department','managers'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(departmentRequest $request, department $department)
    {
        $department->update($request->validated());
        return redirect('/department')->with('status','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return back()->with('status','Department deleted successfully');
    }

    public function restore($id)

    {
        Department::withTrashed()->find($id)->restore();
        return back();
    }  

    public function restoreAll()
    {
        
        Department::onlyTrashed()->restore();
        echo "displayed";
        // return back()->with('status', 'Department restored successfully');
    }
}
