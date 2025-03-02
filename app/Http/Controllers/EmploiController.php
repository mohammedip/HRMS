<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\EmploiRequest;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = Emploi::with('department')->paginate(10); 
        return view('emploi.index', compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all(); 
        return view('emploi.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmploiRequest $request)
    {
        Emploi::create($request->validated());

        return redirect()->route('emploi.index')
                         ->with('status', 'Emploi ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emploi $emploi)
    {
        return view('emploi.show', compact('emploi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emploi $emploi)
    {
        $departments = Department::all();
        return view('emploi.edit', compact('emploi', 'departments'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EmploiRequest $request, Emploi $emploi)
    {
        $emploi->update($request->validated());

        return redirect()->route('emploi.index')
                         ->with('status', 'Emploi mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();

        return redirect()->route('emploi.index')
                         ->with('status', 'Emploi supprimé avec succès.');
    }
}
