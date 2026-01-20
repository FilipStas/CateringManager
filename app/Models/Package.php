<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = ['name', 'description', 'price'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_package', 'package_id', 'food_id')
            ->withPivot('quantity');}
    }
