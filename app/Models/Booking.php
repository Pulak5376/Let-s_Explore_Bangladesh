<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'transport_id',
        'transport_type',
        'booking_date',
        'passenger_name',
        'passenger_email',
        'passenger_phone',
        'seats_booked',
        'payment_status',
    ];

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
