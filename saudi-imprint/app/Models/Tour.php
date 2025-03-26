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
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function tourist()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }
}
