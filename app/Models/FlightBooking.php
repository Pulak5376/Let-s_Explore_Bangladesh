<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;

    protected $table = 'flight_bookings';

    protected $fillable = [
        'from',
        'to',
        'departure_date',
        'return_date',
        'class',
        'passengers',
    ];
}
