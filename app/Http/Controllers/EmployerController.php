<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cursus;
use App\Models\emploi;
use App\Models\Employer;
use App\Models\Department;
use Spatie\Permission\Models\Role; 
use App\Http\Requests\EmployerRequest;
use App\Notifications\NotificationToEmail;
use App\Http\Requests\EmployerUpdateRequest;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $employers = Employer::with('department','role','emploi')->paginate(10);
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
        $emplois = emploi::all();
        return view('employer.create' , compact('departments','roles','emplois'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployerRequest $request )
    {
        $recruitmentDate = Carbon::parse($request->date_recrutement);
        $daysWorked = $recruitmentDate->diffInDays(Carbon::now());
        $LeaveDays =(int)(($daysWorked /30) * 1.5 );

        if($daysWorked > 365){
            $LeaveDays += (int)((($daysWorked - 365)/365) * 0.5);
        }



        $employer =Employer::create(array_merge($request->validated(),['leave_sold' => $LeaveDays])); 

        

        $password = bcrypt('123456789'); 

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $password,  
        
    ]);

        $user->notify(new NotificationToEmail($employer));


    if ($request->has('role_id')) {
        $role = Role::where('id', $request->role_id)->first();
        if ($role) {
            $user->assignRole($role);

        }
    } 
    

        Cursus::create([
            'employer_id' => $employer->id, 
            'name' => $request->name, 
            'contract_type' => $request->type_contrat,
            'department_id' => $request->department_id, 
            'role_id' => $request->role_id,
            'emploi_id' => $request->emploi_id, 
            'salaire' => $request->salaire,
            'grad' => $request->grad,
            'progress' => 0, 
        ]);

        return redirect('/employer')->with('status','Employer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        $employer->load('department','cursus','emploi'); 

        return view('employer.show' , compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        $departments = Department::all();
        $roles = Role::all();
        $emplois = emploi::all();
        return view('employer.edit' , compact('employer','departments','roles','emplois'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerUpdateRequest $request, Employer $employer)
{
    $oldDepartment = $employer->department_id;
    $oldRole = $employer->role_id;
    $oldEmploi = $employer->emploi_id;
    $oldContractType = $employer->type_contrat;
    $oldSlaire = $employer->salaire;
    $oldGrad = $employer->grad;

    $user=User::where('email', $employer->email)->first();


    $recruitmentDate = Carbon::parse($request->date_recrutement);
        $daysWorked = $recruitmentDate->diffInDays(Carbon::now());
        $LeaveDays =(int)(($daysWorked /30) * 1.5 );

        if($daysWorked > 365){
            $LeaveDays += (int)((($daysWorked - 365)/365) * 0.5);
        } 

    $employer->update(array_merge($request->validated(),['leave_sold' => $LeaveDays]));
     
    
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
         
        
    ]);

    if ($request->has('role_id')) {
        $role = Role::where('id', $request->role_id)->first();
        if ($role) {
            $user->roles()->detach();
            $user->assignRole($role);

        }
    } 

    if ($employer->department_id != $oldDepartment || $employer->role_id != $oldRole || 
            $employer->emploi_id != $oldEmploi || $employer->type_contrat != $oldContractType ||
            $employer->salaire != $oldSlaire || $employer->grad != $oldGrad) {
        
        Cursus::create([
            'employer_id' => $employer->id, 
            'name' => $employer->name, 
            'contract_type' => $employer->type_contrat, 
            'department_id' => $employer->department_id, 
            'role_id' => $employer->role_id, 
            'emploi_id' => $employer->emploi_id,
            'salaire' => $employer->salaire,
            'grad' => $employer->grad,
            'progress' => Cursus::where('employer_id', $employer->id)->count(), 
        ]);
    }

    return redirect('/employer')->with('status', 'Employer updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        $user=User::where('email', $employer->email)->first();
        $employer->delete();
        $user->delete();

        return redirect('/employer')->with('status','Employer deleted successfully');
    }

    public function restoreAll()
    {
        Employer::onlyTrashed()->restore();
        return redirect('/employer')->with('status', 'Employer restored successfully');
    }

    public function extractExtraTime(Employer $employer){

        $LeaveDays = $employer->leave_sold + $employer->extra_time;

        $employer->update([
            'leave_sold' => $LeaveDays,
            'extra_time' => 0,
        ]);

        return redirect()->back()->with('success', 'Extract the extra timeLeave successfully.');

    }
}
