<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'person_num',
        'desc',

    ];
    public function user_notifications(){
        return $this->hasMany("App\Models\user_notifications","status_id");
    }
    public function users_rooms(){
        return $this->hasMany("App\Models\users_rooms","status_id");
    }
    public function users_rooms_food(){
        return $this->hasMany("App\Models\users_rooms_food","status_id");
    }
    public function user_room_service(){
        return $this->hasMany("App\Models\user_room_service","status_id");
    }        
}
