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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
