<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use SoftDeletes;

    protected $table = 'formations';

    protected $fillable = [
        'nom',
        'type_formation',
        'date_formation',
        'certification',
    ];

    
    public function employer()
    {
        return $this->belongsToMany(Employe::class, 'employer_formation')
                    ->withTimestamps();
    }

    public function employerFormations()
    {
        return $this->hasMany(EmployerFormation::class, 'formation_id');
    }

}
