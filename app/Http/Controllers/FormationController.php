<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Http\Requests\FormationRequest;
use Illuminate\Http\Request;

class FormationController extends Controller
{
   
    public function index()
    {
        $formations = Formation::paginate(10);
        return view('formation.index', compact('formations'));
    }

   
    public function create()
    {
        return view('formation.create');
    }

   
    public function store(FormationRequest $request)
    {
        Formation::create($request->validated());

        return redirect()->route('formation.index')
                         ->with('status', 'Formation ajoutée avec succès.');
    }

   
    public function show(Formation $formation)
    {
        return view('formation.show', compact('formation'));
    }

    
    public function edit(Formation $formation)
    {
        return view('formation.edit', compact('formation'));
    }

    
    public function update(FormationRequest $request, Formation $formation)
    {
        $formation->update($request->validated());

        return redirect()->route('formation.index')
                         ->with('status', 'Formation mise à jour avec succès.');
    }

   
    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('formation.index')
                         ->with('status', 'Formation supprimée avec succès.');
    }
}
