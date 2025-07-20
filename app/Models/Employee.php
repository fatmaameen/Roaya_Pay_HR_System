<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Employee Info
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
