<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'items',
        'total',
        'status',
        'name',
        'email',
        'address',
    ];

    protected $casts = [
        'items' => 'array',
    ];

}
