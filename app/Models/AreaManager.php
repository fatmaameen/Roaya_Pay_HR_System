<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaManager extends Model
{
    //
    protected $guarded = [];

    /**
     * Relations
     */
    // Department Heads <-> Area Manager
    public function departmentHeads()
    {
        return $this->hasMany(DepartmentHead::class, 'area_manager_id');
    }
}
