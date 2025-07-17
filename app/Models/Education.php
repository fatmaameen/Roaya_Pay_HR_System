<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Education
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
