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

    public function packages()
    {
        return $this->belongsToMany(
            Package::class,
            'order_package',
            'order_id',
            'package_id'
        )->withPivot('quantity');
    }

    public function foods()
    {
        return $this->belongsToMany(
            Food::class,
            'order_food',
            'order_id',
            'food_id'
        )->withPivot('quantity');
    }
}
