<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function tourist()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'type_of_tour' => 'array',
    ];
}
