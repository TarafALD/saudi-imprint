<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    protected $fillable = [
        'Name', 'Image', 'Opening_Hours', 'Location', 'Description', 'Admin_id',];
}
