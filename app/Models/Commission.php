<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //
    protected $guarded = ['id'];

    /**
     * Relations
     */
    // User <-> Commission
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
