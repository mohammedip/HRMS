<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role; 
use App\Models\Department; 

class Employer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employers';

    protected $fillable = [
        'name',                              
        'email',               
        'telephone',           
        'date_naissance',      
        'adresse',             
        'date_recrutement',    
        'type_contrat',        
        'salaire',             
        'statut',  
        'grad',            
        'department_id',      
        'role_id',  
        'emploi_id',            
    ];

    protected $dates = ['deleted_at']; 

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function responsable()
    {
        return $this->belongsTo(Employer::class, 'responsable_id');
    }

    public function emploi()
    {
        return $this->belongsTo(Emploi::class, 'emploi_id');
    }

    public function cursus()
    {
        return $this->hasMany(Cursus::class, 'employer_id');
    }
}
