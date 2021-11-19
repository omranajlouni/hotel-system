<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_room_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_room_id',
        'service_id',
        'status_id',
        'notes',
    ];
}
