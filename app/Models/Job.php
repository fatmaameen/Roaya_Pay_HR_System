<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

  protected $guarded = [];

    public function jobDetails()
    {
        return $this->hasMany(JobDetail::class);
    }

    public function insuranceInfos()
    {
        return $this->hasMany(InsuranceInfo::class);
    }
}
