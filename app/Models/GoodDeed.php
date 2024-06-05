<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class GoodDeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'description', 'city', 'date_time', 'user_id'
    ];

    protected $dates = [
        'date_time',
    ];
}
