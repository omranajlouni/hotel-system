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
        public function statuses(){
            return $this->belongsTo("App\Models\statuses","status_id");
        }
        public function users_rooms(){
            return $this->belongsTo("App\Models\users_rooms","user_room_id");
        }
        public function food(){
            return $this->belongsTo("App\Models\food","food_id");
        }           
}
