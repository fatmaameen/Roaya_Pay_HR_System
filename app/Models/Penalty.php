<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Penalty
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
