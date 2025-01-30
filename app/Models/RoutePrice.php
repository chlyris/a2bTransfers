<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutePrice extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'car_id', 'price'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
