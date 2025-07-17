<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Employee Info
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
