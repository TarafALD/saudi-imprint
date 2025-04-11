<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    public function guide()
    {
        
        return $this->belongsTo(User::class, 'user_id')->where('role', 'TG');
    }
    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class, 'user_id', 'user_id');
        //TourGuide has a user_id column that relates it to the same User
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    public function tourist()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }

    protected $casts = [
        'type_of_tour' => 'array',
    ];

    
}
