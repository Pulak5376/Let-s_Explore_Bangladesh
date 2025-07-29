<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusBooking extends Model
{
    protected $fillable = ['bus_id', 'seats_booked', 'user_id', 'status'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
