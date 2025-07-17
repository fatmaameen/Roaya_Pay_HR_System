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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
