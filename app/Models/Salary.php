<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $guarded = ['id'];

    /**
     * Relations
     * Users Relations
     */
    // User <-> Salary
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
