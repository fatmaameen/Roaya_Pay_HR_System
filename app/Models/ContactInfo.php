<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $guarded = ['id'];

    /**
     * Relations
     */
    // User <-> Contact Info
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }



    // ===============  End Relations   ============================    //


}
