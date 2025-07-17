<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    //
    protected $guarded = ['id'];

    /**
     * Relations
     */
    // Department Heads <-> SuperViosor
    public function departmentHeads()
    {
        return $this->hasMany(DepartmentHead::class, 'supervisor_id');
    }
}
