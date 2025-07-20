<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalIncurance extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Medicial Insurance
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
