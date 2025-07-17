<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalIncurance extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Medicial Insurance
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
