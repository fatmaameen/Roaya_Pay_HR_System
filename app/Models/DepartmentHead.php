<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{
    //
    protected $guarded = ['id'];

    /**
     * Relations
     */
    // Department Heads <-> SuperViosor
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }
    
    
    
    // Department Heads <-> Area Manager
    public function areaManager()
    {
        return $this->belongsTo(AreaManager::class, 'area_manager_id');
    }



    // User <-> Department Head
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
