<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'contact_name',
        'email',
        'phone',
        'location',
        'event_time',
        'event_date',
        'pickup'
    ];

}
