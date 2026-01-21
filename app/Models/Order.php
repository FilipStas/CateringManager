<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 * @method static create(array $array)
 */
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
        'pickup',
        'people_count',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}
