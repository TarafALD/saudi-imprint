<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    // //a user can have one tour guide record 
        public function tourGuide(){
        return $this->hasOne(TourGuide::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookedTours()
    {
        return $this->belongsToMany(Tour::class, 'bookings');
        
    }

    //tour guide gives all tours created by this user
    public function tours()
    {
        return $this->hasMany(Tour::class, 'user_id');
    }

    //tourist reviews
        public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    }
