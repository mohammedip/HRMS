<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\EmployerFormation;
use App\Http\Requests\employerFormationRequest;

class EmployerFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $formations = Formation::with('employerFormations.employer')->get();
    
    $inscriptions = EmployerFormation::with(['formation', 'employer'])->paginate(10);

    return view('employerFormation.index', compact('formations', 'inscriptions'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $formations = Formation::all();
        $employers = Employer::all();
        return view('employerFormation.create' , compact('employers','formations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(employerFormationRequest $request)
    {
        EmployerFormation::create($request->validated());

        return redirect('/employerFormation')->with('status','Inscrire successfully');
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
    public function update(employerFormationRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($employerId, $formationId)
    {

        $inscription = EmployerFormation::where('employer_id', $employerId)->where('formation_id', $formationId)->first();
    
            $inscription->delete();

            return redirect()->route('employerFormation.index')->with('status', 'Inscription supprimée avec succès');
        
    }

}
