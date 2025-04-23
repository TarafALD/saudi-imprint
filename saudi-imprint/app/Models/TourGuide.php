<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TourGuide extends Model
{
    protected $table = '_tour_guides';
    protected $fillable = [
        'user_id',
        'license_number',
        'status',
        'bio',
        'languages',
        'ROO',
        'years_experience',
        'prefrences',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //fetch all tours from the tourguide through user id
    public function tours()
    {
        return $this->hasMany(Tour::class, 'user_id', 'user_id');
    }
   
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected $casts = [
        'languages' => 'array',
        'prefrences'=> 'array',
        'ROO'=> 'array'
    ];
}
