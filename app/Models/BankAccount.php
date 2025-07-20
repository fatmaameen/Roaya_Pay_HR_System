<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = ['id'];


    /**
     * Relations
     */
    // Employee <-> Bank Account
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
