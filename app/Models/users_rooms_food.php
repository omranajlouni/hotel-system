<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_rooms_food extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_room_id',
        'food_id',
        'status_id',
        'count',
        'notes',
        ];
}
