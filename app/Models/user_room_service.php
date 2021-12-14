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
    public function statuses(){
        return $this->belongsTo("App\Models\statuses","status_id");
    }
    public function users_rooms(){
        return $this->belongsTo("App\Models\users_rooms","user_room_id");
    }
    public function service(){
        return $this->belongsTo("App\Models\service","service_id");
    }            
}
