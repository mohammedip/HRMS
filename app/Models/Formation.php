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

    
    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'employe_formation')
                    ->withTimestamps();
    }
}
