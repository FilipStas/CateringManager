<?php

namespace App\Models;

use App\Enums\FoodType;
use App\Enums\QuantityUnit;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name',
        'food_type',
        'unit',
    ];
    protected $casts = [
        'unit' => QuantityUnit::class,
        'food_type' =>FoodType::class,
    ];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }




}

