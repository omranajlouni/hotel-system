<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
    ];
    public function user_room_service(){
        return $this->hasMany("App\Models\user_room_service","service_id");
    }
}
