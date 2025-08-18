<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'price_per_night',
        'rating',
        'image_url',
        'available_rooms'
    ];

    public function bookings()
    {
        return $this->hasMany(HotelBooking::class);
    }

    public function scopeSearch($query, $location, $checkIn, $checkOut, $guests)
    {
        return $query->where('location', 'like', '%' . $location . '%')
                    ->where('available_rooms', '>=', $guests);
    }
}
