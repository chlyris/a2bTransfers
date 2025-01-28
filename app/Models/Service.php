<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'service_date',
        'service_notes',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
