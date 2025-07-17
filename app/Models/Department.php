<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // Department <-> Job Detail
    public function jobDetails()
    {
        return $this->hasMany(JobDetail::class, 'department_id');
    } 
}
