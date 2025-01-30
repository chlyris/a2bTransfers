<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'active',
        'brand',
        'model',
        'year',
        'km',
        'plate',
        'passenger_capacity',
        'trunk_capacity',
        'e_pass',
        'insurance',
        'insurance_expiration',
        'kteo',
        'kteo_expiration',
        'notes',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function routePrices()
    {
        return $this->hasMany(RoutePrice::class);
    }
}
