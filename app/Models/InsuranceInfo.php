<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceInfo extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Insurance Info
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
