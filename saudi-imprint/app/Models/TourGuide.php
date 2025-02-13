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
        'license_path',
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
}
