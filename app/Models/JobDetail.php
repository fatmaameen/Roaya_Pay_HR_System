<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // Job <-> Job Detail
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    } 


    // Department <-> Job Detail
    public function jobDetails()
    {
        return $this->belongsTo(Department::class, 'department_id');
    } 


    // Branch <-> Job Detail
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    } 


    // User <-> Job Detail
    public function user()
    {
        return $this->belongsTo(JobDetail::class, 'user_id');
    }
}
