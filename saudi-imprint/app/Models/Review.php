<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TourGuide;


class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'tour_guide_id',
        'rating',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class, 'tour_guide_id');
    }
    
}