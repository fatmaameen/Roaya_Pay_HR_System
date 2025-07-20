<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveLog extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Leave Logs
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
