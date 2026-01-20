<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'food_package', 'food_id', 'package_id')
            ->withPivot('quantity');
    }
}

