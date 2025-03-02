<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emploi extends Model
{
    use SoftDeletes;

    protected $table = 'emplois';

    protected $fillable = [
        'nom',
        'department_id',
    ];

   
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
