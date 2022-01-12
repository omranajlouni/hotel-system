<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoomService extends Model
{
    protected $table = 'user_room_services'; 

    use HasFactory;
    protected $fillable = [
        'user_room_id',
        'service_id',
        'status_id',
        'notes',
    ];
    public function status(){
        return $this->belongsTo("App\Models\Status","status_id");
    }
    public function userRoom(){
        return $this->belongsTo("App\Models\UserRoom","user_room_id");
    }
    public function service(){
        return $this->belongsTo("App\Models\Service","service_id");
    }            
}
