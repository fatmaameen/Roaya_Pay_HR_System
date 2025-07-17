<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // Job <-> Job Detail
    public function jobDetails()
    {
        return $this->hasMany(JobDetail::class, 'job_id');
    } 
}
