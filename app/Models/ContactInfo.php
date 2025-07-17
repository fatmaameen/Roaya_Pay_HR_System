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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    // ===============  End Relations   ============================    //


}
