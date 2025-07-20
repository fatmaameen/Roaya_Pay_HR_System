<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Education
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
