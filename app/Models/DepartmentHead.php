<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{
  protected $guarded = [];
     public function jobDetails()
    {
        return $this->hasMany(JobDetail::class);
    }
}
