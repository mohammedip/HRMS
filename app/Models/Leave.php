<?php

namespace App\Models;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';

    protected $fillable = [
        'employer_id',
        'start_date',
        'end_date',
        'total_days',
        'reason',
        'statut',
        'hr_approval',
        'manager_approval'

    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
