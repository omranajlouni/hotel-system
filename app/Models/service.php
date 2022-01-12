<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
    ];
    public function userRoomService(){
        return $this->hasMany("App\Models\UserRoomService","service_id");
    }
}
