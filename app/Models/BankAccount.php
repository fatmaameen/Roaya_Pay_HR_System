<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // User <-> Bank Account
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
