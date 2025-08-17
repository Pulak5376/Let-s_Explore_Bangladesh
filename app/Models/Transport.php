<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'name',
        'type',
        'route_from',
        'route_to',
        'departure_time',
        'price',
        'total_seats',
        'available_seats'
    ];
}
