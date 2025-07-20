<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveBalance extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Leave Balance
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
