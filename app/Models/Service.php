<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'pet_name',
        'preferred_date',
        'preferred_time', // ✅ Add this
        'notes',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
