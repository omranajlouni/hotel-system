<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_id',
        'user_id',
        'status_id',
    ];
}
