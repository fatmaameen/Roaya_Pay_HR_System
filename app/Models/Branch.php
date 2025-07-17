<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $guarded = [];


    /**
     * Relations
     */
    // Branch <-> Job Detail
    public function jobDetails()
    {
        return $this->hasMany(JobDetail::class, 'branch_id');
    }
}
