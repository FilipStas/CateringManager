<?php

namespace App\Models;

use App\Enums\QuantityUnit;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $order_id
 */
class OrderItem extends Model
{
    protected $fillable =
        ['order_id',
            'quantity',
            'name',
        ];
    protected $casts = [
        'unit' => QuantityUnit::class,
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
