<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;

class EmployerFormation extends Model
{
    
    
    protected $table = 'employer_formation';

    public $incrementing = false;

    protected $primaryKey = ['employer_id', 'formation_id'];

    protected $fillable = [

        'employer_id',
        'formation_id',

    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }


}
