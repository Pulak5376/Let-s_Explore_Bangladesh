<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model

{
    protected $fillable = [
        'from',
        'to',
        'date',
        'departure_time',
        'bus_class',
        'total_seats',
        'fare',
        'operator_name',
        'recurring'
    ];


    public function bookings()
    {
        return $this->hasMany(BusBooking::class);
    }
}
