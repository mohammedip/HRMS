<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Department;
use Illuminate\Http\Request;

class OrganigrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $hrEmployers = Employer::whereHas('role', function ($query) {
        $query->where('name', 'HR');
    })->get();

    $departments = Department::with(['employes.role'])->get();

    return view('organigramme.index', compact('departments', 'hrEmployers'));
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
