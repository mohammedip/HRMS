<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cursus extends Model
{
    use HasFactory;
    protected $table = 'cursus';

    protected $fillable = [
        'employer_id',
        'name',
        'contract_type',
        'department_id',
        'role_id',
        'emploi_id',
        'salaire',
        'grad',
        'progress',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function emploi()
    {
        return $this->belongsTo(Emploi::class);
    }
}

