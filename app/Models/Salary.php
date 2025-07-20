<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $guarded = ['id'];

    /**
     * Relations
     * Users Relations
     */
    // User <-> Salary
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
