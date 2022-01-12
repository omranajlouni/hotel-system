<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoomFood extends Model
{
    protected $table = 'user_room_foods'; 
    use HasFactory;
    protected $fillable = [
        'user_room_id',
        'food_id',
        'status_id',
        'count',
        'notes',
        ];
        public function status(){
            return $this->belongsTo("App\Models\Status","status_id");
        }
        public function userRoom(){
            return $this->belongsTo("App\Models\UserRoom","user_room_id");
        }
        public function food(){
            return $this->belongsTo("App\Models\Food","food_id");
        }
}
