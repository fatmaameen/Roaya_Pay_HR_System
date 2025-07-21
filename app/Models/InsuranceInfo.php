<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceInfo extends Model
{
protected $guarded = [];


       public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}