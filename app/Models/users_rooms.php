<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'status_id ',
        'duration',
        
    ];
    public function user_room_service(){
        return $this->hasMany("App\Models\user_room_service","user_room_id");
    }
    public function users_rooms_food(){
        return $this->hasMany("App\Models\users_rooms_food","users_rooms_id");
    }        
    public function user(){
        return $this->belongsTo("App\Models\user","user_id");
    }                    
    public function statuses(){
        return $this->belongsTo("App\Models\statuses","status_id");
    }                    
    public function rooms(){
        return $this->belongsTo("App\Models\rooms","room_id");
    }                                
}
