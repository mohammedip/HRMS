<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Employer; 

class Department extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'departments';

    protected $fillable = [
        'nom',
        'description',
        'responsable_id',

    ];

    protected $dates = ['deleted_at']; 

    public function responsable()
    {
        return $this->belongsTo(Employer::class);
    }

    public function employes()
    {
        return $this->hasMany(Employer::class);
    }
}
