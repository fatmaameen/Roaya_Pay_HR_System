<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceInfo extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Insurance Info
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
