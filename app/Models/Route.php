<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['pickup_location', 'dropoff_location'];

    public function routePrices()
    {
        return $this->hasMany(RoutePrice::class);
    }
}
